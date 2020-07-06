<?php

namespace App\Exports;

use App\Iycf;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
    protected $ea;

    function __construct($ea) {
        $this->ea = $ea;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ea = $this->ea;
        ini_set('memory_limit', '-1');

        if(is_array($ea) && sizeof($ea) > 0) {

            $getIycf = Iycf::query();

            foreach($ea as $param){
                $getIycf->orWhere('eacode', 'LIKE', $param.'%');
            }
            
            $result = $getIycf->get();

            return $result;
        }
    }
}
