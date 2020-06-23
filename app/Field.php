<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
     /**
     * Define base table
     * 
     * 
     */
    protected $table = 'fields';


    /**
    * Get all fields
    * 
    * 
    */
    public function getAllFields()
    {
        return $this->all();
    }

}
