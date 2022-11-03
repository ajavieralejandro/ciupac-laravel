<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Logo;
use Image;


class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logos = Logo::paginate(20);
        return view('admin.logos',['logos'=>$logos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addlogo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLogoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $count = Logo::count();
        $logo = new Logo;
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
           $image = $request->file('image');
           $extension = $image->extension();
           $img = Image::make($image->getRealPath());
           
        
           $filename = "logo-".$count.".".$extension;
           $logo->image_name = $filename;
           $logo->image_path = "public/images/logos";


           $img->resize(350,350 , function ($constraint) {
            $constraint->aspectRatio();
        })->save('public/images/logos'.'/'.$filename);
        $logo->name = $request->name;
        $logo->save();

        return redirect('/logos');

   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $id = ($request->route('id'));
        $logo = Logo::find($id);
        return view('admin.editlogo',['logo'=>$logo]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogoRequest  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogoRequest $request, Logo $logo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        
        $member = Logo::find($request->logo_id);
        $member->delete();
        return redirect('/logos');
    }
}
