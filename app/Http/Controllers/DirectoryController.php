<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Directory;
use Validator;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hotline = Directory::get();

        return view('admin.directory.index' , [
            'hotline' => $hotline
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.directory.create');
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
            'type' => 'required',
            'contact' => 'required'
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        if($request->file('image')!=''){
            $destinationPath = 'uploads/directory';
            $photoExtension = $request->file('image')->getClientOriginalExtension(); 
            $file = 'image'.uniqid().'.'.$photoExtension;
            $request->file('image')->move($destinationPath, $file);

            $hotline = Directory::firstOrCreate([
                'name' => $request->input('name'),
                'address'  =>  $request->input('address'),
                'contact'  =>  $request->input('contact'),
                'type'  =>  $request->input('type'),
                'image' => $file
            ]);
    
            
        }else{
            $hotline = Directory::firstOrCreate([
                'name' => $request->input('name'),
                'address'  =>  $request->input('address'),
                'contact'  =>  $request->input('contact'),
                'type'  =>  $request->input('type'),
            ]);
        }



        return redirect()->route('directory.index')->with('flash_message', 'Successfully Added Hotline!');

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
        $hotline = Directory::find($id);

        return view('admin.directory.edit', [ 
            'hotline' => $hotline
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
            'name' => 'required',
            'type' => 'required',
            'contact' => 'required'
        ]);
        
        if ($validator->fails()) {
			return redirect()
				->back()
			    ->withErrors($validator)
				->withInput();
        }

        if($request->file('image')!=''){
            $destinationPath = 'uploads/directory';
            $photoExtension = $request->file('image')->getClientOriginalExtension(); 
            $file = 'image'.uniqid().'.'.$photoExtension;
            $request->file('image')->move($destinationPath, $file);

            $hotline = Directory::find($id); 
            $hotline->name = $request->input('name');
            $hotline->address = $request->input('address');
            $hotline->type = $request->input('type');
            $hotline->contact = $request->input('contact');
            $hotline->image = $file;
            $hotline->save();
        }
        else{
            $hotline = Directory::find($id); 
            $hotline->name = $request->input('name');
            $hotline->address = $request->input('address');
            $hotline->type = $request->input('type');
            $hotline->contact = $request->input('contact');
            $hotline->save();
        }

        return redirect()->route('directory.index')->with('flash_message', 'Successfully Updated Hotline');

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
        
        $x = Directory::find($id);
        $x->delete();

        return redirect()->route('directory.index')->with('flash_message', 'Successfully Deleted Hotline');
    }
}
