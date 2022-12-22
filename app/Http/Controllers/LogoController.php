<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Logo;
use Image;
use Illuminate\Validation\Rule;
use File;



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
        $count = Logo::count();
        $logo = new Logo;
        $validatedData = $request->validate([
            'name' => 'required|unique:logos',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
    
           ]);
           $image = $request->file('image');
           $extension = $image->extension();
           $img = Image::make($image->getRealPath());
           
        
           $filename = "logo-".$count.".".$extension;
           $logo->image_name = $filename;
           $logo->image_path = "public/images/logos";
           $logo->type = $request->type;
           $filename_aux = 'public/images/logos/'.$filename;
           if(File::exists($filename_aux)){
               unlink($filename_aux);
               File::delete(public_path($filename_aux));

           }


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
      
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogoRequest  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->logo_id;
        Rule::unique('logos', 'name')->ignore('id',$id);

        $validatedData = $request->validate([
            'name' => [
                'required',
                //Rule::unique('logos')->ignore($request->logos_id),
            ],
            'type'=>[
                'required',

            ]
  
           ]);
           $member = Logo::whereId($request->logo_id)->update($validatedData);
           $member = Logo::find($request->logo_id)->first();
           //$member->type = $request->type;
            if($request->image){

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
        
               ]);
               $member = Logo::where('id');
               $count = Logo::count();
               $file= $request->file('image');
               $extension = $file->extension();
               $filename = "logos-".$count.".".$extension;
               $filename_aux = 'public/images/logos/'.$filename;
               if(File::exists($filename_aux)){
                   unlink($filename_aux);
                   File::delete(public_path($filename_aux));

               }
               $file-> move(public_path('public/images/logos'), $filename);
               //$member->image_name = $filename;
               Logo::whereId($request->logo_id)->update(['image_name'=>$filename]);        

        }
        //$member->save();

        
        return redirect('/logos');

           
 
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
