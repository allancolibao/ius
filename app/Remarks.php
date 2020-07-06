<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remarks extends Model
{
    use HasUpsertQueries;
    use SoftDeletes;
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'iycf_rem';


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
        "is",
        "remarks", 
    ];


    /**
    * Get all the updated remarks
    * 
    * 
    */
    public function getAllRemarks()
    {
        return $this->all();
    }
}
