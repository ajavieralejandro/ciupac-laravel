<?php

namespace App\Http\Controllers;

use App\Models\Asamblea;
use App\Models\Location;
use Image;


use Illuminate\Http\Request;

class AsambleaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logos = Asamblea::all();
        return view('admin.asambleas',['logos'=>$logos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locations = Location::all();
        return view('admin.createAsamblea',['locations'=>$locations]);
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
        $count = Asamblea::count();
        $asamblea = new Asamblea;
        $asamblea->name = $request->title;
        $asamblea->description = $request->content;
        $asamblea->location_id = $request->location;
        $image = $request->file('image');
        $extension = $image->extension();
        $img = Image::make($image->getRealPath());
        
     
        $filename = "asamblea-".$count.".".$extension;
        $asamblea->image_name = $filename;
        $asamblea->image_path = "public/images/asambleas";

        if (!file_exists($asamblea->image_path)) {
            mkdir($asamblea->image_path, 755, true);
        }
        $img->resize(350,350 , function ($constraint) {
         $constraint->aspectRatio();
     })->save('public/images/asambleas'.'/'.$filename);
     $asamblea->save();
     return view('admin.asambleas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asamblea  $asamblea
     * @return \Illuminate\Http\Response
     */
    public function show(Asamblea $asamblea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asamblea  $asamblea
     * @return \Illuminate\Http\Response
     */
    public function edit(Asamblea $asamblea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asamblea  $asamblea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asamblea $asamblea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asamblea  $asamblea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asamblea $asamblea)
    {
        //
    }
}
