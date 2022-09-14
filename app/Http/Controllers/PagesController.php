<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Image;





class PagesController extends Controller
{
    //
    public function index(){
        $members = Team::all();
        $image = Image::first();
        return view('welcome',['members'=>$members,'image'=>$image]);
    }

    public function admin(){
        return view('admin.adminpanel');
    }

    
}
