<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use App\Iycf;
use App\Field;

class MainController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Iycf $iycf, Field $field)
    {
        $this->iycf = $iycf;
        $this->field = $field;
    }

    /**
     * Home
     * 
     * 
     */
    public function index()
    {
       return view('index');
    }


    /**
     * Search function
     * 
     * 
     */
    public function search(Request $request)
    {

        $rules = array
        (
            'key' => 'required|min:4|max:12'
        );
    
        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {

        $notification = [
            'message' => 'Please re-enter the eacode [ 4-12 digits required ], Thank you!',
            'alert-type' => 'error'
        ];

        return redirect('/')->with($notification);
        
        } else {

        $key = $request['key'];

        $iycf = $this->iycf->getIycfRecord($key);

        return view('search', compact('iycf'));
        }   
    }


    /**
     * EACODE View
     * 
     * 
     */
    public function eacodeView($eacode)
    {

        $iycf = $this->iycf->getIycfRecord($eacode);

        return view('search', compact('iycf'));  
    }


     /**
     * Show Edit modal
     * 
     * 
     */
    public function edit($id)
    {
        $iycf = $this->iycf->getSpecificIycfRecord($id);
        $fields = $this->field->getAllFields();

        return view('update', compact('iycf','fields'));
    }

    /**
    *Update data
    * 
    * 
    */
    public function update(Request $request, $id, $eacode)
    {
        $ea = Str::substr($eacode, 0,4);
        $fields = $this->field->getAllFields();
        $data = $request->all();
        $iycf = $this->iycf->getSpecificIycfRecord($id)->update($data);

        $notification = [
            'message' => 'Data successfully updated!',
            'alert-type' => 'success'
        ];

        return redirect()->route('eacode', ['eacode' => $ea])->with($notification);
    }


    /**
     * Transmit 
     * 
     * 
     */
    public function transmit()
    {
        return view('transmit');  
    }


    /**
     * Transmission Search function
     * 
     * 
     */
    public function trans(Request $request)
    {

        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

        $rules = array
        (
            'key' => 'required|min:12|max:12'
        );
    
        $validator = Validator::make ( $request->all(), $rules);

        if ($validator->fails()) {

            $notification = [
                'message' => 'Please enter the 12 digits EACODE, Thank you!',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        
        } else {

            $key = $request['key'];

            $iycf = Iycf::where('eacode', $key)->exclude('id')->get()->toArray();

            if (empty($iycf)) {

            $notification = [
                'message' => 'No record found, Please enter the correct EACODE!',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
            }

            $insertIycf = Iycf::on('mysqlsec')->insertIgnore($iycf);

            $notification = [
                'message' => 'Data successfully transmitted!',
                'alert-type' => 'info'
            ];

            return redirect()->back()->with($notification); 
        }   

        } else {

            $notification = [
                'message' => 'Please check your internet connection!',
                'alert-type' => 'error'
            ];
            
            return redirect()->back()->with($notification); 

        }
    }

    /**
     * Add page IYCF
     * 
     * 
     */
    public function add()
    {
        $fields = $this->field->getAllFields();

        return view('add', compact('fields'));  
    }

    /**
     * Add IYCF
     * 
     * 
     */
    public function insert(Request $request)
    {

        $data = $request->except('_token');
        $iycf = Iycf::insertIgnore($data);

        $notification = [
            'message' => 'Data successfully saved!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);  
    }

}
