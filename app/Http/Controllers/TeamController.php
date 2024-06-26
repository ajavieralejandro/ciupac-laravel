<?php

namespace App\Http\Controllers;
use Cache;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Team;
use Image;
use Illuminate\Support\Facades\File;


class TeamController extends Controller
{
    //
    public function index(Request $request){
        $data = Team::paginate(20)->sortBy('priority');
        Cache::flush();
        return view('admin.team',['members'=>$data]);

    }

    public function addMember(Request $request){
        return view('admin.addmember');
    }

    public function editMember(Request $request){
        $member = Team::find($request->route('id'));
        return view('admin.editmember',['member'=>$member]);

    }


    public function updateMember(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'priority'=>'required',
            'description' => 'required',
        ]);
        $member = Team::whereId($request->member_id)->update($validatedData);
        //dd(Team::whereId($request->member_id)->get());
        $member = Team::find($request->member_id);

        if($request->visible)
        $member->status=true;
    else
        $member->status=false;
        $member->save();


        if($request->image){
            
            $filename_aux = $member->image_path.'/'.$member->image_name;
            if(File::exists($filename_aux)){
                unlink($filename_aux);
                File::delete(public_path($filename_aux));

            }

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
        
               ]);
               $file= $request->file('image');
               $extension = $file->extension();
               $_aux = Str::random(5);
               $filename = "member-".$_aux.$request->member_id.".".$extension;
               $file-> move(public_path('public/images/members'), $filename);
               Team::whereId($request->member_id)->update(['image_name'=>$filename]);
        

        }

        
        return redirect('/team');
      
    }

    public function deleteMember(Request $request){
        $member = Team::find($request->member_id);
        $member->delete();
        return redirect('/team');
    }

    public function storeMember(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:teams',
            'priority'=>'required',
            'description' => 'required',
            'image'=>'required',
        ]);
        
        $member = new Team;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->description = $request->description;
        $member->priority = $request->priority;
        $member->image_name = "default";
        $member->image_path = "public/images/members";
        $member->path = "";
        if($request->visible)
            $member->status=(int)true;
        else
            $member->status=(int) false;

        $member->save();
        if($request->image){
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:10240',
        
               ]);
               $image = $request->file('image');
               $extension = $image->extension();
               $img = Image::make($image->getRealPath());
            
               //esto es un comentario auxiliar
               $_aux = Str::random(5);
               $filename = "member-".$_aux.$request->member_id.".".$extension;               
               $filename_aux = 'public/images/members/'.$filename;
               if(File::exists($filename_aux)){
                   unlink($filename_aux);
                   File::delete(public_path($filename_aux));

               }

               $img->resize(180, 180, function ($constraint) {
                $constraint->aspectRatio();
            })->save('public/images/members'.'/'.$filename);
       

               //$file= $request->file('image');
               //$filename = "member-".$count.".".$extension;
               //$file-> move(public_path('public/images/members'), $filename);
               $member->image_name = $filename;
               $member->image_path = "public/images/members";
               $member->save();

        }
     
        return redirect('/team');
    }
}
