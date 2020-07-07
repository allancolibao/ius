<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Exception;
use Illuminate\Support\Str;
use App\Imports\RemarksImport;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Iycf;
use App\Field;
use App\Remarks;
use App\Area;
use App\Based;

class MainController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Iycf $iycf, Field $field, Remarks $remarks, Area $area, Based $based)
    {
        $this->iycf = $iycf;
        $this->field = $field;
        $this->remarks = $remarks;
        $this->area = $area;
        $this->based = $based;
    }

    /**
     * Home
     * 
     * 
     */
    public function index()
    {
        $remarks = $this->remarks->getAllRemarks();
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
            'key' => 'required|min:9|max:12'
        );
    
        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {

        $notification = [
            'message' => 'Please re-enter the eacode [ 9-12 digits only ], Thank you!',
            'alert-type' => 'error'
        ];

        return redirect('/')->with($notification);
        
        } else {

        $key = $request['key'];

        $iycf = $this->iycf->getIycfRecord($key);
        $fields = $this->field->getAllFields();

        return view('search', compact('iycf','fields'));
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
        $fields = $this->field->getAllFields();

        return view('search', compact('iycf','fields'));  
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
        $ea = Str::substr($eacode, 0,9);
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
    *Bulk updating
    * 
    * 
    */
    public function bulkUpdate(Request $request)
    {
        $ea = Str::substr($request['eacode'], 0,9);
        $fields = $this->field->getAllFields();

        $data = $request->except('_token');
        
        if(is_array($data) && sizeof($data) > 0){
            foreach($data['id'] as $key => $id){

                $updatedData = [
                    'foi_bmilk_day' => $request->foi_bmilk_day[$key],
                    'foi_bmilk_night' => $request->foi_bmilk_night[$key],
                    'fib_bmilk_day' => $request->fib_bmilk_day[$key],
                    'fib_bmilk_night' => $request->fib_bmilk_night[$key],
                    'foi_water' => $request->foi_water[$key],
                    'fib_water' => $request->fib_water[$key],
                    'foi_milk1_day' => $request->foi_milk1_day[$key],
                    'fib_milk1_day' => $request->fib_milk1_day[$key],
                    'foi_milk1_night' => $request->foi_milk1_night[$key],
                    'fib_milk1_night' => $request->fib_milk1_night[$key],
                    'foi_milk2_day' => $request->foi_milk2_day[$key],
                    'fib_milk2_day' => $request->fib_milk2_day[$key],
                    'foi_milk2_night' => $request->foi_milk2_night[$key],
                    'fib_milk2_night' => $request->fib_milk2_night[$key],
                    'foi_milk3_day' => $request->foi_milk3_day[$key],
                    'fib_milk3_day' => $request->fib_milk3_day[$key],
                    'foi_milk3_night' => $request->foi_milk3_night[$key],
                    'fib_milk3_night' => $request->fib_milk3_night[$key],
                    'foi_othermilkdrinks' => $request->foi_othermilkdrinks[$key],
                    'fib_othermilkdrinks' => $request->fib_othermilkdrinks[$key],
                    'foi_chocodrinks' => $request->foi_chocodrinks[$key],
                    'fib_chocodrinks' => $request->fib_chocodrinks[$key],
                    'foi_caffeinateddrinks' => $request->foi_caffeinateddrinks[$key],
                    'fib_caffeinateddrinks' => $request->fib_caffeinateddrinks[$key],
                    'foi_herbaldrinks' => $request->foi_herbaldrinks[$key],
                    'fib_herbaldrinks' => $request->fib_herbaldrinks[$key],
                    'foi_juice' => $request->foi_juice[$key],
                    'fib_juice' => $request->fib_juice[$key],
                    'foi_clearbroth' => $request->foi_clearbroth[$key],
                    'fib_clearbroth' => $request->fib_clearbroth[$key],
                    'foi_am' => $request->foi_am[$key],
                    'fib_am' => $request->fib_am[$key],
                    'foi_otherliquids' => $request->foi_otherliquids[$key],
                    'fib_otherliquids' => $request->fib_otherliquids[$key],
                    'foi_cerealdrinks' => $request->foi_cerealdrinks[$key],
                    'fib_cerealdrinks' => $request->fib_cerealdrinks[$key],
                    'foi_vitaminerals' => $request->foi_vitaminerals[$key],
                    'fib_vitaminerals' => $request->fib_vitaminerals[$key],
                    'dds_grains' => $request->dds_grains[$key],
                    'fvs_grains' => $request->fvs_grains[$key],
                    'fib_grains' => $request->fib_grains[$key],
                    'forti_grains' => $request->forti_grains[$key],
                    'forti_vita_grains' => $request->forti_vita_grains[$key],
                    'forti_iron_grains' => $request->forti_iron_grains[$key],
                    'forti_others_grains' => $request->forti_others_grains[$key],
                    'dds_processedcereals' => $request->dds_processedcereals[$key],
                    'fvs_processedcereals' => $request->fvs_processedcereals[$key],
                    'fib_processedcereals' => $request->fib_processedcereals[$key],
                    'forti_processedcereals' => $request->forti_processedcereals[$key],
                    'forti_vita_processedcereals' => $request->forti_vita_processedcereals[$key],
                    'forti_iron_processedcereals' => $request->forti_iron_processedcereals[$key],
                    'forti_others_processedcereals' => $request->forti_others_processedcereals[$key],
                    'dds_legumes' => $request->dds_legumes[$key],
                    'fvs_legumes' => $request->fvs_legumes[$key],
                    'fib_legumes' => $request->fib_legumes[$key],
                    'forti_legumes' => $request->forti_legumes[$key],
                    'forti_vita_legumes' => $request->forti_vita_legumes[$key],
                    'forti_iron_legumes' => $request->forti_iron_legumes[$key],
                    'forti_others_legumes' => $request->forti_others_legumes[$key],
                    'dds_milk' => $request->dds_milk[$key],
                    'fvs_milk' => $request->fvs_milk[$key],
                    'fib_milk' => $request->fib_milk[$key],
                    'forti_milk' => $request->forti_milk[$key],
                    'forti_vita_milk' => $request->forti_vita_milk[$key],
                    'forti_iron_milk' => $request->forti_iron_milk[$key],
                    'forti_others_milk' => $request->forti_others_milk[$key],
                    'dds_milkprod' => $request->dds_milkprod[$key],
                    'fvs_milkprod' => $request->fvs_milkprod[$key],
                    'fib_milkprod' => $request->fib_milkprod[$key],
                    'forti_milkprod' => $request->forti_milkprod[$key],
                    'forti_vita_milkprod' => $request->forti_vita_milkprod[$key],
                    'forti_iron_milkprod' => $request->forti_iron_milkprod[$key],
                    'forti_others_milkprod' => $request->forti_others_milkprod[$key],
                    'dds_othermilk' => $request->dds_othermilk[$key],
                    'fvs_othermilk' => $request->fvs_othermilk[$key],
                    'fib_othermilk' => $request->fib_othermilk[$key],
                    'forti_othermilk' => $request->forti_othermilk[$key],
                    'forti_vita_othermilk' => $request->forti_vita_othermilk[$key],
                    'forti_iron_othermilk' => $request->forti_iron_othermilk[$key],
                    'forti_others_othermilk' => $request->forti_others_othermilk[$key],
                    'dds_flesh' => $request->dds_flesh[$key],
                    'fvs_flesh' => $request->fvs_flesh[$key],
                    'fib_flesh' => $request->fib_flesh[$key],
                    'forti_flesh' => $request->forti_flesh[$key],
                    'forti_vita_flesh' => $request->forti_vita_flesh[$key],
                    'forti_iron_flesh' => $request->forti_iron_flesh[$key],
                    'forti_others_flesh' => $request->forti_others_flesh[$key],
                    'dds_procflesh' => $request->dds_procflesh[$key],
                    'fvs_procflesh' => $request->fvs_procflesh[$key],
                    'fib_procflesh' => $request->fib_procflesh[$key],
                    'forti_procflesh' => $request->forti_procflesh[$key],
                    'forti_vita_procflesh' => $request->forti_vita_procflesh[$key],
                    'forti_iron_procflesh' => $request->forti_iron_procflesh[$key],
                    'forti_others_procflesh' => $request->forti_others_procflesh[$key],
                    'dds_eggs' => $request->dds_eggs[$key],
                    'fvs_eggs' => $request->fvs_eggs[$key],
                    'fib_eggs' => $request->fib_eggs[$key],
                    'forti_eggs' => $request->forti_eggs[$key],
                    'forti_vita_eggs' => $request->forti_vita_eggs[$key],
                    'forti_iron_eggs' => $request->forti_iron_eggs[$key],
                    'forti_others_eggs' => $request->forti_others_eggs[$key],
                    'dds_vitariched' => $request->dds_vitariched[$key],
                    'fvs_vitariched' => $request->fvs_vitariched[$key],
                    'fib_vitariched' => $request->fib_vitariched[$key],
                    'forti_vitariched' => $request->forti_vitariched[$key],
                    'forti_vita_vitariched' => $request->forti_vita_vitariched[$key],
                    'forti_iron_vitariched' => $request->forti_iron_vitariched[$key],
                    'forti_others_vitariched' => $request->forti_others_vitariched[$key],
                    'dds_otherfveg' => $request->dds_otherfveg[$key],
                    'fvs_otherfveg' => $request->fvs_otherfveg[$key],
                    'fib_otherfveg' => $request->fib_otherfveg[$key],
                    'forti_otherfveg' => $request->forti_otherfveg[$key],
                    'forti_vita_otherfveg' => $request->forti_vita_otherfveg[$key],
                    'forti_iron_otherfveg' => $request->forti_iron_otherfveg[$key],
                    'forti_others_otherfveg' => $request->forti_others_otherfveg[$key],
                    'dds_oilsandfats' => $request->dds_oilsandfats[$key],
                    'fvs_oilsandfats' => $request->fvs_oilsandfats[$key],
                    'fib_oilsandfats' => $request->fib_oilsandfats[$key],
                    'forti_oilsandfats' => $request->forti_oilsandfats[$key],
                    'forti_vita_oilsandfats' => $request->forti_vita_oilsandfats[$key],
                    'forti_iron_oilsandfats' => $request->forti_iron_oilsandfats[$key],
                    'forti_others_oilsandfats' => $request->forti_others_oilsandfats[$key],
                    'dds_sweets' => $request->dds_sweets[$key],
                    'fvs_sweets' => $request->fvs_sweets[$key],
                    'fib_sweets' => $request->fib_sweets[$key],
                    'forti_sweets' => $request->forti_sweets[$key],
                    'forti_vita_sweets' => $request->forti_vita_sweets[$key],
                    'forti_iron_sweets' => $request->forti_iron_sweets[$key],
                    'forti_others_sweets' => $request->forti_others_sweets[$key],
                    'dds_ssb' => $request->dds_ssb[$key],
                    'fvs_ssb' => $request->fvs_ssb[$key],
                    'fib_ssb' => $request->fib_ssb[$key],
                    'forti_ssb' => $request->forti_ssb[$key],
                    'forti_vita_ssb' => $request->forti_vita_ssb[$key],
                    'forti_iron_ssb' => $request->forti_iron_ssb[$key],
                    'forti_others_ssb' => $request->forti_others_ssb[$key],
                    'dds_spicescondi' => $request->dds_spicescondi[$key],
                    'fvs_spicescondi' => $request->fvs_spicescondi[$key],
                    'fib_spicescondi' => $request->fib_spicescondi[$key],
                    'forti_spicescondi' => $request->forti_spicescondi[$key],
                    'forti_vita_spicescondi' => $request->forti_vita_spicescondi[$key],
                    'forti_iron_spicescondi' => $request->forti_iron_spicescondi[$key],
                    'forti_others_spicescondi' => $request->forti_others_spicescondi[$key],
                    'dds_beverages' => $request->dds_beverages[$key],
                    'fvs_beverages' => $request->fvs_beverages[$key],
                    'fib_beverages' => $request->fib_beverages[$key],
                    'forti_beverages' => $request->forti_beverages[$key],
                    'forti_vita_beverages' => $request->forti_vita_beverages[$key],
                    'forti_iron_beverages' => $request->forti_iron_beverages[$key],
                    'forti_others_beverages' => $request->forti_others_beverages[$key],
                    'dds_snacks' => $request->dds_snacks[$key],
                    'fvs_snacks' => $request->fvs_snacks[$key],
                    'fib_snacks' => $request->fib_snacks[$key],
                    'forti_snacks' => $request->forti_snacks[$key],
                    'forti_vita_snacks' => $request->forti_vita_snacks[$key],
                    'forti_iron_snacks' => $request->forti_iron_snacks[$key],
                    'forti_others_snacks' => $request->forti_others_snacks[$key],
                    'dds_otherfood' => $request->dds_otherfood[$key],
                    'fvs_otherfood' => $request->fvs_otherfood[$key],
                    'fib_otherfood' => $request->fib_otherfood[$key],
                    'forti_otherfood' => $request->forti_otherfood[$key],
                    'forti_vita_otherfood' => $request->forti_vita_otherfood[$key],
                    'forti_iron_otherfood' => $request->forti_iron_otherfood[$key],
                    'forti_others_otherfood' => $request->forti_others_otherfood[$key],
                    'dds_mnp' => $request->dds_mnp[$key],
                    'fvs_mnp' => $request->fvs_mnp[$key],
                    'fib_mnp' => $request->fib_mnp[$key],
                    'forti_mnp' => $request->forti_mnp[$key],
                    'forti_vita_mnp' => $request->forti_vita_mnp[$key],
                    'forti_iron_mnp' => $request->forti_iron_mnp[$key],
                    'forti_others_mnp' => $request->forti_others_mnp[$key],
                    'totaldds' => $request->totaldds[$key],
                    'totalfvs' => $request->totalfvs[$key],
                    'totalfeedings' => $request->totalfeedings[$key],
                    'currentfeeding' => $request->currentfeeding[$key],
                    'ever_exclusivebf' => $request->ever_exclusivebf[$key],
                    'ever_exclusivebf_duration' => $request->ever_exclusivebf_duration[$key],
                    'ever_exclusivebf_others' => $request->ever_exclusivebf_others[$key],
                    'bottlefed' => $request->bottlefed[$key],
                    'bottlefed_bmilk' => $request->bottlefed_bmilk[$key],
                    'bottlefed_water' => $request->bottlefed_water[$key],
                    'bottlefed_milk' => $request->bottlefed_milk[$key],
                    'bottlefed_othermilk' => $request->bottlefed_othermilk[$key],
                    'bottlefed_chocodrinks' => $request->bottlefed_chocodrinks[$key],
                    'bottlefed_caffdrinks' => $request->bottlefed_caffdrinks[$key],
                    'bottlefed_watersugar' => $request->bottlefed_watersugar[$key],
                    'bottlefed_herbal' => $request->bottlefed_herbal[$key],
                    'bottlefed_juice' => $request->bottlefed_juice[$key],
                    'bottlefed_clearbroth' => $request->bottlefed_clearbroth[$key],
                    'bottlefed_am' => $request->bottlefed_am[$key],
                    'bottlefed_cerealdrinks' => $request->bottlefed_cerealdrinks[$key],
                    'vitminsupplements' => $request->vitminsupplements[$key],
                    'ever_bf_f42' => $request->ever_bf_f42[$key],
                    'cur_fdg_f42' => $request->cur_fdg_f42[$key],
                    'IS_INDIV_f11' => $request->IS_INDIV_f11[$key],
                    'interview_status' => $request->interview_status[$key],
                    'remarks' => $request->remarks[$key],
                ];

                $iycf = $this->iycf->updateIycfRecord($id)->update($updatedData);

            }
        }

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

     /**
     * Remarks Page
     * 
     * 
     */
    public function remarks()
    {
        $remarks = $this->remarks->getAllRemarks();

        return view('remarks', compact('remarks'));
    }


    /**
     * Remarks Page
     * 
     * 
     */
    public function updateRemarks()
    {
        $remarks = $this->remarks->getAllRemarks();

        if(sizeof($remarks) > 0) {
            foreach($remarks as $index => $remark){

                $eacode =  $remark->eacode;
                $hcn =  $remark->hcn; 
                $shsn =  $remark->shsn; 
                $memberCode =  $remark->member_code;

                $data = [
                    'interview_status' => $remark->is,
                    'remarks' => $remark->remarks
                ];

                $iycf = $this->iycf->updateNewRemarks($eacode, $hcn, $shsn, $memberCode, $data);
            }
        }

        $deleted = Remarks::truncate();

        $notification = [
            'message' => 'Data successfully updated!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification); 
    }


     /**
     * Export Page
     * 
     * 
     */
    public function export()
    {
        $areas = $this->area->getAllAreas();

        return view('export', compact('areas'));
    }


    /**
    * 
    * 
    * Import CSV
    */
    public function import() 
    {
        try {

            Excel::import(new RemarksImport, request()->file('file'));

        } catch (Exception $error) {

            $notification = [

                'message' => 'Please double check the CSV File, Particulary the header!',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

           
        $notification = [
            'message' => 'Data successfully uploaded!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    /**
    *  Delete uploaded CSV Data
    */
    public function delete() 
    {
        
        $deleted = Remarks::truncate();

        $notification = [
            'message' => 'Data successfully deleted!',
            'alert-type' => 'warning'
        ];

        return redirect()->back()->with($notification);
    }


    /**
    * Download CSV
    */
    public function exportData(Request $request) 
    {
        $ea = $request['ea'];

        if($ea !== null) {

            $notification = [
                'message' => 'Data successfully exported!',
                'alert-type' => 'success'
            ];

            return Excel::download(new DataExport($ea), 'iycf.xlsx');

        } else {

            $notification = [
                'message' => 'Please select atleast one area!',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }


     /**
     * Transmision Page
     * 
     * 
     */
    public function transmission()
    {   
        $areas = $this->area->getAllAreas();

        if(sizeOf($areas) > 0){

            foreach($areas as $area){

                $based = Based::where('eacode', 'LIKE', $area->ea.'%');
                $transmitted = Iycf::where('eacode', 'LIKE', $area->ea.'%');

                $countBased = $based->get()->count();
                $countTrans = $transmitted->get()->count();

                $results[] = [
                    'area_name'    => $area->name,
                    'ea'    => $area->ea,
                    'count_based' => $countBased,
                    'count_trans' => $countTrans,
                ];
            }
                
        }

        return view('transmission', compact('areas','results'));
    }


     /**
     * Diff Page
     * 
     * 
     */
    public function diff($ea)
    {

        $based = Based::where('eacode', 'LIKE', $ea.'%');
        $transmitted = Iycf::where('eacode', 'LIKE', $ea.'%')->get('eacode');

        $result = $based->whereNotIn('eacode', $transmitted)->distinct()->get('eacode');

        return view('result', compact('result'));
    }
}
