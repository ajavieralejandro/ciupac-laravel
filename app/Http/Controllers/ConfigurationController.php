<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;



class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $config = Configuration::first();
        if(!$config)
        return view('admin.configuration');
        else
        return view('admin.editconfiguration',['config'=>$config]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function show(Configuration $configuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuration $configuration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'facebook' => 'required|max:255',
            'instagram' => 'required|max:255',
            'tel' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',

            
        ]);
        $config = Configuration::first();
        if(!$config)
            $config = new Configuration;
    
            $config->facebook = $request->facebook;
            $config->instagram = $request->instagram;
            $config->tel = $request->tel;
            $config->adress = $request->address;
            $config->email = $request->email;
            $config->youtube = $request->youtube;
            if($request->visible)
            $config->visible=true;
            else
            $config->visible=false;
            $config->save();




        
        return view('admin.adminpanel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuration $configuration)
    {
        //
    }
}
