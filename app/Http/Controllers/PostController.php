<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(20);
        return view('admin.posts',['posts'=>$posts]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.createpost');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->content;
        $file= $request->file('image');
        $extension = $file->extension();
        $count = Post::count();
        $filename = "post-".$count.".".$extension;
        $file-> move(public_path('public/images/posts'), $filename);
        $post->image_name = $filename;
        $post->image_path = "public/images/posts";
        if($request->visible)
            $post->visible=true;
        else
            $post   ->visible=false;
        $post->save();
        return redirect('/posts'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $member = Post::find($request->route('id'));
        return view('layouts.post',['post'=>$member]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $member = Post::find($request->route('id'));
        return view('admin.editpost',['post'=>$member]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',

        ]);

        $member = Post::whereId($request->post_id)->update($validatedData);
        $member = Post::find($request->post_id);
        if($request->visible)
            $member->visible=true;
        else
            $member->visible=false;
        $member->body = $request->content;

        if($request->image){

            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        
               ]);
               $count = Post::count();
               $file= $request->file('image');
               $extension = $file->extension();
               $filename = "post-".$count.".".$extension;
               $file-> move(public_path('public/images/posts'), $filename);
               $member->image_name = $filename;
               Post::whereId($request->member_id)->update(['image_name'=>$filename]);
        

        }
        $member->save();

        
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $member = Post::find($request->post_id);
        $member->delete();
        return redirect('/posts');
    }
}
