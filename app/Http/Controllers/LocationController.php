<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreLocationRequest;
//use App\Http\Requests\UpdateLocationRequest;
use Illuminate\Http\Request;

use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Location::paginate(20);
        return view('admin.locations',['locations'=>$data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createLocation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          //
          $validated = $request->validate([
            'name' => 'required|unique:locations|max:255',
            'longitude' => 'required|numeric|between:-90,90'
            ,
            'latitude' => 'required|numeric|between:-90,90'
            ,

        ]);
        $location = new Location;
        $location->name = $request->name;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->save();
        return redirect('/locations');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $location = Location::find($request->route('id'));
        return view('admin.editLocation',['location'=>$location]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationRequest  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    
        $validatedData = $request->validate([
            'name' => 'required|unique:locations|max:255',
            'longitude' => 'required|numeric|between:-90,90'
            ,
            'latitude' => 'required|numeric|between:-90,90'
            ,

        ]);
        Location::whereId($request->location_id)->update($validatedData);
        return redirect('/locations');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $member = Location::find($request->location_id);
        $member->delete();
        return redirect('/locations');
    }
}
