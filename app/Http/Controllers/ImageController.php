<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;


class ImageController extends Controller
{
    //

    public function index(){
        return view('admin.uploadimage');
    }

    

    public function store(Request $request){

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
            
           ]);

           $file= $request->file('image');
           $extension = $request->file('image')->extension();
           $filename= 'portada.'.$extension;
           $file-> move(public_path('public/images/portada'), $filename);
        
        
           $save = new Image;
    
           $save->name = $filename;
           $save->path = 'public/images/portada';
    
           $save->save();
    
        return view('home');
    }
}
