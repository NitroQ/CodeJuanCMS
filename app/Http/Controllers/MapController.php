<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EvacuationCenter;

class MapController extends Controller
{
    public function viewMap(){

        $centers = EvacuationCenter::where('active' , 1)->get();

        return view('evacuation_map' , ['centers' => $centers]);

    }
}
