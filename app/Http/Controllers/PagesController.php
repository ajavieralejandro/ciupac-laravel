<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Image;
use App\Models\Logo;
use App\Models\Post;
use App\Models\Location;









class PagesController extends Controller
{
    //
    public function index(){
        $locations = Location::all();
        $members = Team::all();
        $image = Image::first();
        $logos = Logo::all();
        $posts = Post::paginate(20);
        return view('welcome4',['members'=>$members,'image'=>$image,'logos'=>$logos,'posts'=>$posts,'locations'=>$locations]);
    }

    public function admin(){
        return view('admin.adminpanel');
    }

    
}
