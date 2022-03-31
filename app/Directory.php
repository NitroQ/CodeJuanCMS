<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $fillable = [
        'image',
        'name',
        'address',
        'type',
        'contact'
    ];
        
    public $table = 'directory';
}
