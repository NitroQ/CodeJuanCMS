<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvacuationCenter extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact',
        'latitude',
        'longitude',
        'description',
        'active'
    ];
        
    public $table = 'evacuation_centers';
}
