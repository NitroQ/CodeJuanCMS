<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EvacuationCenter;
use Validator;

class EvacuationCentersController extends Controller
{

    public function setActive($id)
    {
        $v = EvacuationCenter::find($id);
        $v->active = 1;
        $v->save();

        return redirect()->back();

    }

    public function setInactive($id)
    {
        $v = EvacuationCenter::find($id);
        $v->active = 0;
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
        $centers = EvacuationCenter::paginate(15);

        return view('admin.centers.index' , ['centers' => $centers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.centers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        $centers = EvacuationCenter::firstOrCreate([
            'name' => $request->input('name'),
			'address'  =>  $request->input('address'),
            'contact'  =>  $request->input('contact'),
            'latitude'  =>  $request->input('latitude'),
            'longitude'  =>  $request->input('longitude'),
            'description'  =>  $request->input('description'),
        ]);

        return redirect()->route('centers.index')->with('flash_message', 'Successfully Added Evacuation Center');

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
        $center = EvacuationCenter::where('id' , $id)->first();

        return view('admin.centers.edit' , ['center' => $center]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        $center = EvacuationCenter::find($id); 
        $center->name = $request->input('name');
        $center->address = $request->input('address');
        $center->contact = $request->input('contact');
        $center->latitude = $request->input('latitude');
        $center->longitude = $request->input('longitude');
        $center->description = $request->input('description');
        $center->save();

        return redirect()->route('centers.index')->with('flash_message', 'Successfully Updated Evacuation Center');

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

    public function delete($id){
        
        $x = EvacuationCenter::find($id);
        $x->delete();

        return redirect()->route('centers.index')->with('flash_message', 'Successfully Deleted Evacuation Center');
    }
}
