<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;
use Illuminate\Database\Eloquent\SoftDeletes;

class Iycf extends Model
{
    use HasUpsertQueries;
    use SoftDeletes;
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'iycf';


    /**
     * For mass assignment
     * 
     * 
     */
    protected $fillable =  [
        "eacode",
        "hcn",
        "shsn",
        "member_code",
        "res_name",
        "surname_f11",
        "givenname_f11",
        "age_f11",
        "agemos",
        "sex_f11",
        'foi_bmilk_day',
        'foi_bmilk_night',
        'fib_bmilk_day',
        'fib_bmilk_night',
        'foi_water',
        'fib_water',
        'foi_milk1_day',
        'fib_milk1_day',
        'foi_milk1_night',
        'fib_milk1_night',
        'foi_milk2_day',
        'fib_milk2_day',
        'foi_milk2_night',
        'fib_milk2_night',
        'foi_milk3_day',
        'fib_milk3_day',
        'foi_milk3_night',
        'fib_milk3_night',
        'foi_othermilkdrinks',
        'fib_othermilkdrinks',
        'foi_chocodrinks',
        'fib_chocodrinks',
        'foi_caffeinateddrinks',
        'fib_caffeinateddrinks',
        'foi_herbaldrinks',
        'fib_herbaldrinks',
        'foi_juice',
        'fib_juice',
        'foi_clearbroth',
        'fib_clearbroth',
        'foi_am',
        'fib_am',
        'foi_otherliquids',
        'fib_otherliquids',
        'foi_cerealdrinks',
        'fib_cerealdrinks',
        'foi_vitaminerals',
        'fib_vitaminerals',
        'dds_grains',
        'fvs_grains',
        'fib_grains',
        'forti_grains',
        'forti_vita_grains',
        'forti_iron_grains',
        'forti_others_grains',
        'dds_processedcereals',
        'fvs_processedcereals',
        'fib_processedcereals',
        'forti_processedcereals',
        'forti_vita_processedcereals',
        'forti_iron_processedcereals',
        'forti_others_processedcereals',
        'dds_legumes',
        'fvs_legumes',
        'fib_legumes',
        'forti_legumes',
        'forti_vita_legumes',
        'forti_iron_legumes',
        'forti_others_legumes',
        'dds_milk',
        'fvs_milk',
        'fib_milk',
        'forti_milk',
        'forti_vita_milk',
        'forti_iron_milk',
        'forti_others_milk',
        'dds_milkprod',
        'fvs_milkprod',
        'fib_milkprod',
        'forti_milkprod',
        'forti_vita_milkprod',
        'forti_iron_milkprod',
        'forti_others_milkprod',
        'dds_othermilk',
        'fvs_othermilk',
        'fib_othermilk',
        'forti_othermilk',
        'forti_vita_othermilk',
        'forti_iron_othermilk',
        'forti_others_othermilk',
        'dds_flesh',
        'fvs_flesh',
        'fib_flesh',
        'forti_flesh',
        'forti_vita_flesh',
        'forti_iron_flesh',
        'forti_others_flesh',
        'dds_procflesh',
        'fvs_procflesh',
        'fib_procflesh',
        'forti_procflesh',
        'forti_vita_procflesh',
        'forti_iron_procflesh',
        'forti_others_procflesh',
        'dds_eggs',
        'fvs_eggs',
        'fib_eggs',
        'forti_eggs',
        'forti_vita_eggs',
        'forti_iron_eggs',
        'forti_others_eggs',
        'dds_vitariched',
        'fvs_vitariched',
        'fib_vitariched',
        'forti_vitariched',
        'forti_vita_vitariched',
        'forti_iron_vitariched',
        'forti_others_vitariched',
        'dds_otherfveg',
        'fvs_otherfveg',
        'fib_otherfveg',
        'forti_otherfveg',
        'forti_vita_otherfveg',
        'forti_iron_otherfveg',
        'forti_others_otherfveg',
        'dds_oilsandfats',
        'fvs_oilsandfats',
        'fib_oilsandfats',
        'forti_oilsandfats',
        'forti_vita_oilsandfats',
        'forti_iron_oilsandfats',
        'forti_others_oilsandfats',
        'dds_sweets',
        'fvs_sweets',
        'fib_sweets',
        'forti_sweets',
        'forti_vita_sweets',
        'forti_iron_sweets',
        'forti_others_sweets',
        'dds_ssb',
        'fvs_ssb',
        'fib_ssb',
        'forti_ssb',
        'forti_vita_ssb',
        'forti_iron_ssb',
        'forti_others_ssb',
        'dds_spicescondi',
        'fvs_spicescondi',
        'fib_spicescondi',
        'forti_spicescondi',
        'forti_vita_spicescondi',
        'forti_iron_spicescondi',
        'forti_others_spicescondi',
        'dds_beverages',
        'fvs_beverages',
        'fib_beverages',
        'forti_beverages',
        'forti_vita_beverages',
        'forti_iron_beverages',
        'forti_others_beverages',
        'dds_snacks',
        'fvs_snacks',
        'fib_snacks',
        'forti_snacks',
        'forti_vita_snacks',
        'forti_iron_snacks',
        'forti_others_snacks',
        'dds_otherfood',
        'fvs_otherfood',
        'fib_otherfood',
        'forti_otherfood',
        'forti_vita_otherfood',
        'forti_iron_otherfood',
        'forti_others_otherfood',
        'dds_mnp',
        'fvs_mnp',
        'fib_mnp',
        'forti_mnp',
        'forti_vita_mnp',
        'forti_iron_mnp',
        'forti_others_mnp',
        'totaldds',
        'totalfvs',
        'totalfeedings',
        'currentfeeding',
        'ever_exclusivebf',
        'ever_exclusivebf_duration',
        'ever_exclusivebf_others',
        'bottlefed',
        'bottlefed_bmilk',
        'bottlefed_water',
        'bottlefed_milk',
        'bottlefed_othermilk',
        'bottlefed_chocodrinks',
        'bottlefed_caffdrinks',
        'bottlefed_watersugar',
        'bottlefed_herbal',
        'bottlefed_juice',
        'bottlefed_clearbroth',
        'bottlefed_am',
        'bottlefed_cerealdrinks',
        'vitminsupplements',
        'ever_bf_f42',
        'cur_fdg_f42',
        'IS_INDIV_f11',
        'interview_status',
        'remarks',
    ];


     /**
     *  All columns
     * 
     * 
     */
    protected $columns = [
        "id",
        "fno_foodrecall",
        "hucprov_2019",
        "eacode",
        "hcn",
        "shsn",
        "member_code",
        "res_name",
        "surname_f11",
        "givenname_f11",
        "age_f11",
        "agemos",
        "sex_f11",
        "foi_bmilk_day",
        "foi_bmilk_night",
        "fib_bmilk_day",
        "fib_bmilk_night",
        "foi_water",
        "fib_water",
        "foi_milk1_day",
        "fib_milk1_day",
        "foi_milk1_night",
        "fib_milk1_night",
        "foi_milk2_day",
        "fib_milk2_day",
        "foi_milk2_night",
        "fib_milk2_night",
        "foi_milk3_day",
        "fib_milk3_day",
        "foi_milk3_night",
        "fib_milk3_night",
        "foi_othermilkdrinks",
        "fib_othermilkdrinks",
        "foi_chocodrinks",
        "fib_chocodrinks",
        "foi_caffeinateddrinks",
        "fib_caffeinateddrinks",
        "foi_herbaldrinks",
        "fib_herbaldrinks",
        "foi_juice",
        "fib_juice",
        "foi_clearbroth",
        "fib_clearbroth",
        "foi_am",
        "fib_am",
        "foi_otherliquids",
        "fib_otherliquids",
        "foi_cerealdrinks",
        "fib_cerealdrinks",
        "foi_vitaminerals",
        "fib_vitaminerals",
        "dds_grains",
        "fvs_grains",
        "fib_grains",
        "forti_grains",
        "forti_vita_grains",
        "forti_iron_grains",
        "forti_others_grains",
        "dds_processedcereals",
        "fvs_processedcereals",
        "fib_processedcereals",
        "forti_processedcereals",
        "forti_vita_processedcereals",
        "forti_iron_processedcereals",
        "forti_others_processedcereals",
        "dds_legumes",
        "fvs_legumes",
        "fib_legumes",
        "forti_legumes",
        "forti_vita_legumes",
        "forti_iron_legumes",
        "forti_others_legumes",
        "dds_milk",
        "fvs_milk",
        "fib_milk",
        "forti_milk",
        "forti_vita_milk",
        "forti_iron_milk",
        "forti_others_milk",
        "dds_milkprod",
        "fvs_milkprod",
        "fib_milkprod",
        "forti_milkprod",
        "forti_vita_milkprod",
        "forti_iron_milkprod",
        "forti_others_milkprod",
        "dds_othermilk",
        "fvs_othermilk",
        "fib_othermilk",
        "forti_othermilk",
        "forti_vita_othermilk",
        "forti_iron_othermilk",
        "forti_others_othermilk",
        "dds_flesh",
        "fvs_flesh",
        "fib_flesh",
        "forti_flesh",
        "forti_vita_flesh",
        "forti_iron_flesh",
        "forti_others_flesh",
        "dds_procflesh",
        "fvs_procflesh",
        "fib_procflesh",
        "forti_procflesh",
        "forti_vita_procflesh",
        "forti_iron_procflesh",
        "forti_others_procflesh",
        "dds_eggs",
        "fvs_eggs",
        "fib_eggs",
        "forti_eggs",
        "forti_vita_eggs",
        "forti_iron_eggs",
        "forti_others_eggs",
        "dds_vitariched",
        "fvs_vitariched",
        "fib_vitariched",
        "forti_vitariched",
        "forti_vita_vitariched",
        "forti_iron_vitariched",
        "forti_others_vitariched",
        "dds_otherfveg",
        "fvs_otherfveg",
        "fib_otherfveg",
        "forti_otherfveg",
        "forti_vita_otherfveg",
        "forti_iron_otherfveg",
        "forti_others_otherfveg",
        "dds_oilsandfats",
        "fvs_oilsandfats",
        "fib_oilsandfats",
        "forti_oilsandfats",
        "forti_vita_oilsandfats",
        "forti_iron_oilsandfats",
        "forti_others_oilsandfats",
        "dds_sweets",
        "fvs_sweets",
        "fib_sweets",
        "forti_sweets",
        "forti_vita_sweets",
        "forti_iron_sweets",
        "forti_others_sweets",
        "dds_ssb",
        "fvs_ssb",
        "fib_ssb",
        "forti_ssb",
        "forti_vita_ssb",
        "forti_iron_ssb",
        "forti_others_ssb",
        "dds_spicescondi",
        "fvs_spicescondi",
        "fib_spicescondi",
        "forti_spicescondi",
        "forti_vita_spicescondi",
        "forti_iron_spicescondi",
        "forti_others_spicescondi",
        "dds_beverages",
        "fvs_beverages",
        "fib_beverages",
        "forti_beverages",
        "forti_vita_beverages",
        "forti_iron_beverages",
        "forti_others_beverages",
        "dds_snacks",
        "fvs_snacks",
        "fib_snacks",
        "forti_snacks",
        "forti_vita_snacks",
        "forti_iron_snacks",
        "forti_others_snacks",
        "dds_otherfood",
        "fvs_otherfood",
        "fib_otherfood",
        "forti_otherfood",
        "forti_vita_otherfood",
        "forti_iron_otherfood",
        "forti_others_otherfood",
        "dds_mnp",
        "fvs_mnp",
        "fib_mnp",
        "forti_mnp",
        "forti_vita_mnp",
        "forti_iron_mnp",
        "forti_others_mnp",
        "totaldds",
        "totalfvs",
        "totalfeedings",
        "currentfeeding",
        "ever_exclusivebf",
        "ever_exclusivebf_duration",
        "ever_exclusivebf_others",
        "bottlefed",
        "bottlefed_bmilk",
        "bottlefed_water",
        "bottlefed_milk",
        "bottlefed_othermilk",
        "bottlefed_chocodrinks",
        "bottlefed_caffdrinks",
        "bottlefed_watersugar",
        "bottlefed_herbal",
        "bottlefed_juice",
        "bottlefed_clearbroth",
        "bottlefed_am",
        "bottlefed_cerealdrinks",
        "vitminsupplements",
        "ever_bf_f42",
        "cur_fdg_f42",
        "IS_INDIV_f11",
        "interview_status",
        "remarks",
        "created_at",
        "updated_at",
    ];


    /**
     *  Exclude scope method
     * 
     * 
     */
    public function scopeExclude($query,$value = array())
    {

        return $query->select( array_diff( $this->columns,(array) $value) );

    }


    /**
    * Get all the IYCF Record
    * 
    * 
    */
    public function getIycfRecord($eacode)
    {
        return $this->where('eacode', 'like', '%'.$eacode.'%')->get();
    }


    /**
    * Update specific IYCF Record
    * 
    * 
    */
    public function getSpecificIycfRecord($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
    * Update IYCF Record
    * 
    * 
    */
    public function updateIycfRecord($id)
    {
        return $this->where('id', $id);
    }


    /**
    * Get the Exact EACODE for trasmission
    * 
    * 
    */
    public function TransIycfRecord($eacode)
    {
        return $this->where('eacode', $eacode)->get()->exclude('id');
    }

     /**
    * Get the Exact EACODE for trasmission
    * 
    * 
    */
    public function updateNewRemarks($eacode, $hcn, $shsn, $memberCode, $data)
    {
        return $this->where('eacode', $eacode)
                    ->where('hcn', $hcn)
                    ->where('shsn', $shsn)
                    ->where('member_code', $memberCode)
                    ->update($data);
    }


    /**
    * Get the Exact EACODE for trasmission
    * 
    * 
    */
    public function deleteTheSpecificIndiv($eacode, $hcn, $shsn, $memberCode)
    {
        return $this->where('eacode', $eacode)
                    ->where('hcn', $hcn)
                    ->where('shsn', $shsn)
                    ->where('member_code', $memberCode)
                    ->delete();
    }

}
