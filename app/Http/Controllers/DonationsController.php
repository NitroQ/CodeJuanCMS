<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Donations;
use App\DonationDrives;
use Validator;

class DonationsController extends Controller
{

    public function endDonation($id)
    {
        $v = DonationDrives::find($id);
        $v->status = 0;
        $v->save();

        return redirect()->back();
    }
    public function startDonation($id)
    {
        $v = DonationDrives::find($id);
        $v->status = 1;
        $v->save();

        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donations::get();
        $total = Donations::sum('amount');


        return view('admin.donation.list' , [
            'donations' => $donations,
            'total' => $total
        ]);
    }

    public function drivesIndex()
    {

        $drive = DonationDrives::get();

        return view('admin.donation.drive' , [
            'drive' => $drive
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $donations = Donations::firstOrCreate([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'categ' => $request->input('categ'),
            'method' => $request->input('method'),
            'amount' => $request->input('amount'),
        ]);

        return redirect()->route('donate')->with('donation_success','Success');

    }

    public function drivesStore(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required'
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        if($request->file('image')!=''){
            $destinationPath = 'uploads/drives';
            $photoExtension = $request->file('image')->getClientOriginalExtension(); 
            $file = 'image'.uniqid().'.'.$photoExtension;
            $request->file('image')->move($destinationPath, $file);

            $don = DonationDrives::firstOrCreate([
                'title' => $request->input('title'),
                'start_date'  =>  $request->input('start_date'),
                'end_date'  =>  $request->input('end_date'),
                'description'  =>  $request->input('description'),
                'image' => $file
        ]);
    
            
        }
        else
        {
            $don = DonationDrives::firstOrCreate([
                'title' => $request->input('title'),
                'start_date'  =>  $request->input('start_date'),
                'end_date'  =>  $request->input('end_date'),
                'description'  =>  $request->input('description'),
                'type'  =>  $request->input('type'),
            ]);
        }

        return redirect()->route('donation-drives')->with('flash_message', 'Successfully Added Donation Drive');


    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
