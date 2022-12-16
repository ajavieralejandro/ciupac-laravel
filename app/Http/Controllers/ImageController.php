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
        try{
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
        
                
               ]);
    
               $file= $request->file('image');
               $extension = $request->file('image')->extension();
               $filename= 'portada.'.$extension;
               $file-> move(public_path('public/images/portada'), $filename);
            
               if(!Image::count()>0){
                $save = new Image;
        
                $save->name = $filename;
                $save->path = 'public/images/portada';
         
                $save->save();
    
               }
               else {
                $image = Image::first();
                $image->name = $filename;
                $image->path = 'public/images/portada';
                $image->save();
    
    
    
               }
              
        
            return view('home');

        }
        catch (exception $e) {
            abort(500);
        }

      
    }
}
