<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use  App\Models\Configuration;



class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $links = Link::all();
        return view('admin.links',['links'=>$links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    public function links(){
        $tutorials = Link::where('tutorial',0)->get();
        $conf = Configuration::first();
        return view('archivos.tutoriales',['conf'=>$conf,'tutorials'=>$tutorials]);
       
    }

    public function tutorials(){
        $tutorials = Link::where('tutorial',1)->get();
        $conf = Configuration::first();
        return view('archivos.tutoriales',['conf'=>$conf,'tutorials'=>$tutorials]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:links|max:255',
            'link' =>  'required|unique:links|max:255',

        ]);
        $link = new Link;
        $link->name = $request->name;
        $link->link = $request->link;
        if($request->tutorial)
        $link->tutorial = true;
    else 
        $link->tutorial = false;
                $link->save();
        return redirect('/links');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $link = Link::find($request->id);
        return view('admin.editlink',['link'=>$link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required','unique:links,id_to_ignore',
            'link' =>  'required','unique:links,id_to_ignore','max:255',

        ]);
        $link = Link::whereId($request->link_id)->update($validated);
        $link = Link::find($request->link_id);
        if($request->tutorial)
            $link->tutorial = true;
        else 
            $link->tutorial = false;
        $link->save();
        return redirect('/links');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        
        $member = Link::find($request->link_id);
        $member->delete();
        return redirect('/links');
    }
}
