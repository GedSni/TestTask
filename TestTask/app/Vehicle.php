<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'model',
        'year',
        'fuel_idle',
        'fuel_road',
        'fuel_load'
    ];

    public function journey(){
        return $this->hasMany('App\Journey');
    }
}
