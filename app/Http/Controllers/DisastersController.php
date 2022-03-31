<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Disaster;
use Validator;

class DisastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $disasters = Disaster::get();

        return view('admin.disasters.index', [
            'disasters' => $disasters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.disasters.create');
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
            'hero_image' => 'required',
            'disaster_type' => 'required',
            'content' => 'required',
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        $destinationPath = 'uploads/hero';
        $photoExtension = $request->file('hero_image')->getClientOriginalExtension(); 
        $file = 'hero_image'.uniqid().'.'.$photoExtension;
        $request->file('hero_image')->move($destinationPath, $file);
        
        $disasters = Disaster::firstOrCreate([
            'hero_image' => $file,
            'disaster_type' => $request->input('disaster_type'),
			'content'  =>  $request->input('content'),
        ]);

        return redirect()->route('disasters.index')->with('flash_message', 'Successfully Added Disaster');

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

        $disaster = Disaster::find($id);

        return view('admin.disasters.edit' , ['disaster' => $disaster]);
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
            'disaster_type' => 'required',
            'content' => 'required',
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        if($request->file('hero_image')!=''){
            $destinationPath = 'uploads/hero';
            $photoExtension = $request->file('hero_image')->getClientOriginalExtension(); 
            $file = 'hero_image'.uniqid().'.'.$photoExtension;
            $request->file('hero_image')->move($destinationPath, $file);
            
            $disaster = Disaster::find($id); 
            $disaster->disaster_type = $request->input('disaster_type');
            $disaster->content = $request->input('content');
            $disaster->hero_image = $file;
            $disaster->save();
        }
        else{
            $disaster = Disaster::find($id); 
            $disaster->disaster_type = $request->input('disaster_type');
            $disaster->content = $request->input('content');
            $disaster->save();
        }


        return redirect()->route('disasters.index')->with('flash_message', 'Successfully Updated Disaster');

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
