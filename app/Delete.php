<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delete extends Model
{
    use HasUpsertQueries;
    use SoftDeletes;
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'iycf_del';


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
    ];


    /**
    * Get all to delete members
    * 
    * 
    */
    public function getAllToDelete()
    {
        return $this->all();
    }
}
