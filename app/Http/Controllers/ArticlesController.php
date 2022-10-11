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
    public function create(Request $request)
    {
       
     
  

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
           //
           $count = Articles::count();
           $article = new Articles;
           $validatedData = $request->validate([
               'name' => 'required|max:50',
               "document" => "required|mimes:pdf"
       
              ]);
              $document = $request->file('document');
              $extension = $document->extension();
              $uniqueFileName = $request->name.'.'.$extension;
        
        $request->file('document')->move(public_path('public/documents/'), $uniqueFileName);
              
           
              $article->name = $request->name;
              $article->path = "public/documents/".$uniqueFileName;
    
           $article->save();
   
           return redirect('/articles');
   
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
    public function destroy(Request $request)
    {
        //
         //
         $member = Articles::find($request->article_id);
         $member->delete();
         return redirect('/articles');
    }
}
