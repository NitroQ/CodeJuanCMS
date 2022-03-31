<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerts extends Model
{
    protected $fillable = [
        'image',
        'title',
        'tag',
        'description',
        'active'
    ];
        
    public $table = 'alerts';
}
