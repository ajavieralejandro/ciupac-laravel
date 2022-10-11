<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticlesRequest;
use App\Http\Requests\UpdateArticlesRequest;
use App\Models\Articles;
use Illuminate\Http\Request;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Articles::paginate(20);
        return view('admin.articles',['articles'=>$articles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //
          $count = Article::count();
          $article = new Article;
          $validatedData = $request->validate([
              'image' => 'required|max:50',
              "document" => "required|mimes:pdf"
      
             ]);
             $document = $request->file('document');
             $extension = $image->extension();
             $img = Image::make($image->getRealPath());
             
          
             $filename = "logo-".$count.".".$extension;
             $logo->image_name = $filename;
             $logo->image_path = "public/images/logos";
  
  
             $img->resize(250,250 , function ($constraint) {
              $constraint->aspectRatio();
          })->save('public/images/logos'.'/'.$filename);
          $logo->name = $request->name;
          $logo->save();
  
          return redirect('/logos');
  
     
  

        return view('admin.addarticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticlesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticlesRequest  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticlesRequest $request, Articles $articles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {
        //
    }
}
