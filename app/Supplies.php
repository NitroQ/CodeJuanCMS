<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    protected $fillable = [
        'kit_id',
        'supply_desc'
    ];
        
    public $table = 'supplies';
}
