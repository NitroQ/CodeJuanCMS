<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Disaster;
use App\Alerts;
use App\EvacuationCenter;
use App\Directory;
use App\Kits;
use App\Supplies;
use App\Donations;
use App\DonationDrives;
use Log;

use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home(){

        $alerts = Alerts::latest()->limit(3)->get();

        return view('home', [
            'alerts' => $alerts
        ]);
    }

    public function dashboard(){

        $reliefSum = Donations::where('categ' , 'relief')->sum('amount');
        $needSum = Donations::where('categ' , 'needed')->sum('amount');
        $recoverySum = Donations::where('categ' , 'recovery')->sum('amount');
        $causeSum = Donations::where('categ' , 'cause')->sum('amount');
        $total = Donations::sum('amount');

        $donations = Donations::get();
        
        return view('admin.dashboard' , [
            'reliefSum' => $reliefSum,
            'needSum' => $needSum,
            'recoverySum' => $recoverySum,
            'causeSum' => $causeSum,
            'total' => $total,
            'donations' => $donations
        ]);
    }

    public function adminMap(){

        $centers = EvacuationCenter::get();

        return view('admin.admin_map' , ['centers' => $centers]);

    }

    public function login(){
        return view('login');
    }

    public function logout()
	{
		if(Auth::check())
		{
			auth()->logout();
		}		
				
		return redirect('/login');
	}

    public function disaster($type){

        $disaster_content = Disaster::where('disaster_type' , $type)->first();

        return view('disaster' , [
            'disaster_content' => $disaster_content
        ]);
    }

    public function directory(){

        $brgyDirectory = Directory::where('type' , 'barangay')->get();
        $calDirectory = Directory::where('type' , '!=' ,  'barangay')
        ->where('type' , '!=' ,  'other')
        ->orderBy('type')
        ->get();

        $otDirectory = Directory::where('type' , 'other')->get();

        return view ('directory' , [
            'brgyDirectory' => $brgyDirectory,
            'calDirectory' => $calDirectory,
            'otDirectory' => $otDirectory
        ]);
    }

    public function evacuationCenters(){

        $evac = EvacuationCenter::where('active' , 1)->get();

        return view ('evacuation_centers' , [
            'evac' => $evac,
        ]);
    }

    public function kit(){

        $kits = Kits::get();
        $supplies = Supplies::get();

        return view('kit' , [
            'kits' => $kits,
            'supplies' => $supplies
        ]);
    }

    public function planAhead(){
        return view('planning');
    }

    public function safetySkills(){
        return view('safety_skills');
    }

    public function donate(){

        $don = DonationDrives::where('status' , 1)->first();
        Log::info($don);
        
        return view('donate.donate' , [
            'don' => $don
        ]);
    }

    public function donateView($id){

        $donation = DonationDrives::find($id);

        return view('donate.view' , [
            'donation' => $donation
        ]);
    }
    
    public function alertView($id){

        $alert = Alerts::find($id);

        return view('alerts' , [
            'alert' => $alert
        ]);
    }
}
