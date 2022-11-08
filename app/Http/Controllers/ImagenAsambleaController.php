<?php

namespace App\Http\Controllers;

use App\Models\ImagenAsamblea;
use App\Models\Asamblea;

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
        $imagenes = $asamblea->imagenes()->get();
        return view('admin.imagenesAsamblea',['asamblea'=>$asamblea,'imagenes'=>$imagenes]);

        
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
    public function destroy(ImagenAsamblea $imagenAsamblea)
    {
        //
    }
}
