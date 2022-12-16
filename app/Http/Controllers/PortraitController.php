<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\Portrait;
use Illuminate\Http\Request;



class PortraitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Portrait::count()==0){

            $validatedData = $request->validate([
                'content' => 'required',
                'title' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
            ]);
    
            $portrait = new Portrait;
            $portrait->body = $request->content;
            $portrait->title = $request->title;
            $file= $request->file('image');
            $extension = $file->extension();
            $count = Portrait::count();
            $filename = "portrait-".$count.".".$extension;
            $file-> move(public_path('public/images/portrait'), $filename);
            $portrait->image_name = $filename;
            $portrait->image_path = "public/images/portrait";
            $portrait->save();

        }
        else{
               //
        $validatedData = $request->validate([
            'content' => 'required',
        ]);
        $portrait = Portrait::first();
        $portrait->body = $request->content;
        $portrait->title = $request->title;

        if($request->image){

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
        
               ]);
               $file= $request->file('image');
               $extension = $file->extension();
               $filename = "portrait-".$portrait->id.".".$extension;
               $file-> move(public_path('public/images/portrait'), $filename);
               $portrait->image_name = $filename;
               $portrait->image_path = "public/images/portrait";
        

        }
        $portrait->save();
        }
        return view('admin.adminpanel');

          //
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $portrait = Portrait::first();
        return view('admin.editportrait',['portrait'=>$portrait]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
