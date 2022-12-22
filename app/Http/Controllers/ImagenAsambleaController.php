<?php

namespace App\Http\Controllers;

use App\Models\ImagenAsamblea;
use App\Models\Asamblea;
use File;
use Illuminate\Http\Request;


class ImagenAsambleaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $asamblea = Asamblea::find($request->id);
        $imagenes;
        if($asamblea)
            $imagenes = $asamblea->imagenes()->get();
        return view('admin.imagenesAsamblea',['asamblea'=>$asamblea,'imagenes'=>$imagenes]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.createAsambleaImagen',['id'=>$request->id]);       
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
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
    
            
           ]);
           $count = ImagenAsamblea::count();
           $file= $request->file('image');
           $extension = $request->file('image')->extension();
           $imagename= 'image-'.$count.'.'.$extension;
           $img = new ImagenAsamblea;
           $img->image_name = $imagename;
           $img->image_path = 'public/images/imagenasamblea';
           $img->asamblea_id = $request->id;
           $filename_aux = 'public/images/imagenasamblea/'.$imagename;
           if(File::exists($filename_aux)){
               unlink($filename_aux);
           }
           $file-> move(public_path('public/images/imagenasamblea'), $imagename);        
           $img->save();
           $asamblea = Asamblea::find($request->id);
           $imagenes;
           if($asamblea)
               $imagenes = $asamblea->imagenes()->get();
           return view('admin.imagenesAsamblea',['asamblea'=>$asamblea,'imagenes'=>$imagenes]);
       }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImagenAsamblea  $imagenAsamblea
     * @return \Illuminate\Http\Response
     */
    public function show(ImagenAsamblea $imagenAsamblea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImagenAsamblea  $imagenAsamblea
     * @return \Illuminate\Http\Response
     */
    public function edit(ImagenAsamblea $imagenAsamblea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImagenAsamblea  $imagenAsamblea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImagenAsamblea $imagenAsamblea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImagenAsamblea  $imagenAsamblea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $member = ImagenAsamblea::find($request->imagen_id);
        $id = $request->asamblea_id;
        $member->delete();
        return redirect()->route('showImagenAsamblea', ['id' => $id]);

    }
}
