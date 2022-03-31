<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    protected $fillable = [
    'hero_image',
		'disaster_type',
		'content',
    ];
    
    public $table = 'disasters';
}
