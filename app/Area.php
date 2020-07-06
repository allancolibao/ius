<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'area';



    /**
    * Get all fields
    * 
    * 
    */
    public function getAllAreas()
    {
        return $this->orderBy('name')->get();
    }
}
