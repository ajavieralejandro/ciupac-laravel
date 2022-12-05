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
use App\Models\Configuration;
use App\Models\Asamblea;




class PagesController extends Controller
{
    //
    public function index(){
        
        $conf = Configuration::first();
        
        if(!$conf || !$conf->visible)
            return view('index');
        else{
            $locations = Location::all();
            $members = Team::all()->where('status');
            $image = Image::first();
            $logos = Logo::all()->where('type','CP');
            $logos1 = Logo::all()->where('type','F');
            $logos2 = Logo::all()->where('type','A');


            $about = About::first();
            $asambleas = Asamblea::all();
            $articles = Articles::paginate(5);
            $portrait = Portrait::first();
            $posts = Post::orderBy('created_at','DESC')->paginate(3)->where('visible');
            return view('welcome4',['members'=>$members,'image'=>$image,'logos'=>$logos,'posts'=>$posts,'locations'=>$locations,
                                    'about'=>$about,'portrait'=>$portrait,'articles'=>$articles,'conf'=>$conf,'asambleas'=>$asambleas,
                                    'logos1'=>$logos1,'logos2'=>$logos2,
            ]);

        }
      
    }

    public function admin(){
        return view('admin.adminpanel');
    }

    
}
