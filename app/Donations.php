<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'categ',
        'method',
        'amount'
    ];
        
    public $table = 'donations';

}
