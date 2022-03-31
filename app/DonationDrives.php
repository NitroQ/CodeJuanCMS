<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationDrives extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'start_date',
        'end_date',
        'status'
    ];
        
    public $table = 'donation_drives';
}
