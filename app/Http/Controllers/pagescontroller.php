<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Post;
use DB;
use GuzzleHttp\Psr7\Message;



class pagescontroller extends Controller
{
    public function index()
    {
        // $title= 'welcom to laravel';
        // return view('pages.index', compact('title'));
        // return view('pages.index')->with('title',$title);//same think compact
        $posts = Post::latest()->take(3)->get();

        // $posts = Post::orderBy('created_at', 'desc')->take(2)->get();
        return view('pages.index')->with('posts', $posts);
    }
    public function about()
    {

        return view('pages.about');
    }
    public function contact()
    {

        return view('pages.contact');
    }
  

    public function services()
    {
        $data = array(
            'title' => 'services',
            'services' => ['web', 'programming', 'logic']
        );
        return view('pages.services')->with($data);
    }
}
