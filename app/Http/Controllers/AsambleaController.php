<?php

namespace App\Http\Controllers;

use App\Models\Asamblea;
use App\Models\Location;
use Image;
use File;
use App\Models\Configuration;
use Str;



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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'location_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',

        ]);
        $count = Asamblea::count();
        $asamblea = new Asamblea;
        $asamblea->name = $request->title;
        $asamblea->description = $request->content;
        $asamblea->location_id = $request->location_id;
        $image = $request->file('image');
        $extension = $image->extension();
        $img = Image::make($image->getRealPath());
        
        $logos = Asamblea::all();
        $_aux = Str::random(3);
        $filename = "asamblea-".$_aux.$count.".".$extension;
        $asamblea->image_name = $filename;
        $asamblea->image_path = "public/images/asambleas";
        $filename_aux = 'public/images/asambleas/'.$filename;
        if(File::exists($filename_aux)){
            unlink($filename_aux);
            File::delete(public_path($filename_aux));

        }
        if (!file_exists($asamblea->image_path)) {
            mkdir($asamblea->image_path, 755, true);
        }
        $img->resize(350,350 , function ($constraint) {
         $constraint->aspectRatio();
     })->save('public/images/asambleas'.'/'.$filename);
     $asamblea->save();
     return redirect('/asambleas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asamblea  $asamblea
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        
        $asamblea = Asamblea::find($request->id);
        $images = $asamblea->imagenes()->paginate(10);
        $image = $asamblea->imagenes()->first();
        $conf = Configuration::first();
        return view('layouts.asamblea',['asamblea'=>$asamblea,'conf'=>$conf,'images'=>$images,'image'=>$image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asamblea  $asamblea
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $asamblea = Asamblea::find($request->id);
        $locations = Location::all();
        return view('admin.editAsamblea',['asamblea'=>$asamblea,'locations'=>$locations]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asamblea  $asamblea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
           //
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'location_id' => 'required',


        ]);

        $member = Asamblea::find($request->asamblea_id);
        $member->name = $request->name;
        $member->location_id = $request->location_id;
        $member->description = $request->content;

        if($request->image){

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
        
               ]);
               $count = $member->id;
               $file= $request->file('image');
               $extension = $file->extension();
               $filename = $member->image_name;
               
               $filename_aux = 'public/images/asambleas/'.$filename;
               if(File::exists($filename_aux)){
                   unlink($filename_aux);
                   File::delete(public_path($filename_aux));

               }
               $_aux = Str::random(5);
               $filename = "asamblea-".$_aux.".".$extension;

               $file-> move(public_path('public/images/asambleas'), $filename);
               $member->image_name = $filename;
               Asamblea::whereId($request->member_id)->update(['image_name'=>$filename]);
        

        }
        $member->save();

        
        return redirect('/asambleas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asamblea  $asamblea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
         //
         $member = Asamblea::find($request->asamblea_id);
         $member->delete();
         return redirect('/asambleas');
    }
}
