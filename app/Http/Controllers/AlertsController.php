<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Alerts;
use Validator;
use Log;

class AlertsController extends Controller
{

    public function setActive($id)
    {
        $v = Alerts::find($id);
        $v->active = 1;
        $v->save();

        return redirect()->back();

    }

    public function setInactive($id)
    {
        $v = Alerts::find($id);
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
        $alerts = Alerts::get();

        return view('admin.alerts.index',[
            'alerts' => $alerts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alerts.create');
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
            'image' => 'required',
            'title' => 'required',
            'tag' => 'required',
            'description' => 'required'
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        $destinationPath = 'uploads/alerts';
        $photoExtension = $request->file('image')->getClientOriginalExtension(); 
        $file = 'image'.uniqid().'.'.$photoExtension;
        $request->file('image')->move($destinationPath, $file);
        
        $alerts = Alerts::firstOrCreate([
            'title' => $request->input('title'),
			'tag'  =>  $request->input('tag'),
            'description'  =>  $request->input('description'),
            'image' => $file
        ]);

        return redirect()->route('alerts.index')->with('flash_message', 'Successfully Added Alert');

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
        $alert = Alerts::find($id);

        return view('admin.alerts.edit' , [
            'alert' => $alert
        ]);
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
            'title' => 'required',
            'tag' => 'required',
            'description' => 'required'
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        if($request->file('image')!=''){
            $destinationPath = 'uploads/alerts';
            $photoExtension = $request->file('image')->getClientOriginalExtension(); 
            $file = 'image'.uniqid().'.'.$photoExtension;
            $request->file('image')->move($destinationPath, $file);

            $alert = Alerts::find($id); 
            $alert->title = $request->input('title');
            $alert->tag = $request->input('tag');
            $alert->description = $request->input('description');
            $alert->image = $file;
            $alert->save();
        }
        else{
            $alert = Alerts::find($id); 
            $alert->title = $request->input('title');
            $alert->tag = $request->input('tag');
            $alert->description = $request->input('description');
            $alert->save();
        }

        return redirect()->route('alerts.index')->with('flash_message', 'Successfully Updated Alert');

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
        
        $x = Alerts::find($id);
        $x->delete();

        return redirect()->route('alerts.index')->with('flash_message', 'Successfully Deleted Alert');
    }
}
