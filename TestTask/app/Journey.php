<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'route',
        'exit_terminal_time',
        'speedometer_stats_before',
        'arrive_client_time',
        'unloading_time_minutes',
        'exit_client_time',
        'arrive_terminal_time',
        'speedometer_stats_after',
        'distance_kms',
        'fuel_litres',
        'user_id',
        'vehicle_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function vehicle(){
        return $this->belongsTo('App\Vehicle');
    }
}
