<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Image;
use App\Models\Logo;







class PagesController extends Controller
{
    //
    public function index(){
        $members = Team::all();
        $image = Image::first();
        $logos = Logo::all();
        return view('welcome',['members'=>$members,'image'=>$image,'logos'=>$logos]);
    }

    public function admin(){
        return view('admin.adminpanel');
    }

    
}
