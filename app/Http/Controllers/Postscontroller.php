<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Post;
use DB;


class Postscontroller extends Controller
{/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->take(1)->get();
        return view('posts.index')->with('posts', $posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'reuired'
        ]);
        //handle file upload
        if($request->hasfile('image')){
            //get filename with the extension
            $filenameWithExt =$request->file('image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET just ext
            $extension =$request->file('image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //uplode image
           $path = $request->file('image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore ='noimage.jpg';
        }
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->description;
        //create posts
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('description');
        $post->user_id =auth()->user()->id;
        $post->cover_image =$fileNameToStore;

        $post->save();


        return redirect()->route('posts.index')->with('message', 'Post Created!');
     }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return post::find($id);
        $post = post::find($id);
        return view('posts/show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        //check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('posts')->with('error', 'unauthoirzed pages!');
        }
        return view('posts/edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'reuired'
        ]);
       //handle file upload
       if($request->hasfile('cover_image')){
        //get filename with the extension
        $filenameWithExt =$request->file('cover_image')->getClientOriginalName();
        //get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //GET just ext
        $extension =$request->file('cover_image')->getClientOriginalExtension();
        //filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //uplode image
       $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

    }
    //update post
    $post = post::find($id);
    $post = new Post();
    $post->title = $request->input('title');
    $post->body = $request->input('description');
    //or
    // $post->title = $request->title;same think
    // $post->body = $request->description;
    ///////////////
    if($request->hasfile('cover_image')){
        $post->cover_image =  $fileNameToStore;
    } 
    //////////////
    if($post->cover_image != 'noimage.jpg'){
        //delete image
       Storage::delete('public/cover_images/'.$post->cover_image);
    }
/////////////////
  
    $post->update();


    return redirect()->route('posts.index')->with('message', 'Post update!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);

        //check for correct user
        if (Auth()->user()->id !== $post->user_id) {
            return redirect()->route('/posts')->with('error', 'unauthoirzed pages!');
        }
        if ($post->cover_image != 'Zoo.jpg') {
            //delete image
          Storage::delete('public/cover_images/'.$post->cover_image);
        }





        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post delete successfully !');
    }
}
