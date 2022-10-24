<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;



class AboutController extends Controller
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
        if(About::count()==0){

            $validatedData = $request->validate([
                'content' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
    
            $about = new About;
            $about->body = $request->content;
            $file= $request->file('image');
            $extension = $file->extension();
            $count = About::count();
            $filename = "about-".$count.".".$extension;
            $file-> move(public_path('public/images/about'), $filename);
            $about->image_name = $filename;
            $about->image_path = "public/images/about";
            $about->save();

        }
        else{
               //
        $validatedData = $request->validate([
            'content' => 'required',
        ]);
        $about = About::first();
        $about->body = $request->content;

        if($request->image){

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        
               ]);
               $file= $request->file('image');
               $extension = $file->extension();
               $filename = "about-".$request->member_id.".".$extension;
               $file-> move(public_path('public/images/about'), $filename);
               About::first()->update(['image_name'=>$filename]);
        

        }
        $about->save();
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
        $about = About::first();
        return view('admin.editabout',['about'=>$about]);
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
