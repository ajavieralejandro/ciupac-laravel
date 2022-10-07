<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Image;
use App\Models\Logo;
use App\Models\Post;
use App\Models\Location;
use App\Models\About;










class PagesController extends Controller
{
    //
    public function index(){
        $locations = Location::all();
        $members = Team::all();
        $image = Image::first();
        $logos = Logo::all();
        $about = About::first();
        $posts = Post::orderBy('created_at')->paginate(4);
        return view('welcome4',['members'=>$members,'image'=>$image,'logos'=>$logos,'posts'=>$posts,'locations'=>$locations,
                                'about'=>$about
        ]);
    }

    public function admin(){
        return view('admin.adminpanel');
    }

    
}
