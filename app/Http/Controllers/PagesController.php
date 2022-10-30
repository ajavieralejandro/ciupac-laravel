<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Image;
use App\Models\Logo;
use App\Models\Post;
use App\Models\Location;
use App\Models\About;
use App\Models\Portrait;
use App\Models\Articles;
use App\Models\Show;












class PagesController extends Controller
{
    //
    public function index(){
        $show = Show::first();
        if(!$show || !$show->visible())
            return view('index');
        else{
            $locations = Location::all();
            $members = Team::all();
            $image = Image::first();
            $logos = Logo::all();
            $about = About::first();
            $articles = Articles::paginate(5);
            $portrait = Portrait::first();
            $posts = Post::orderBy('created_at')->paginate(3);
            return view('welcome4',['members'=>$members,'image'=>$image,'logos'=>$logos,'posts'=>$posts,'locations'=>$locations,
                                    'about'=>$about,'portrait'=>$portrait,'articles'=>$articles
            ]);

        }
      
    }

    public function admin(){
        return view('admin.adminpanel');
    }

    
}
