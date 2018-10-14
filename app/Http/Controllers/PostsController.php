<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Carbon\Carbon;
class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){
        $posts = Posts::latest()->filter(request(['month', 'year']))->get(); 
 

        //$archives = Posts::archives();

    	return view('Posts.index', compact('posts'));
    }

    public function show(Posts $post){


    	return view('Posts.show',  compact('post'));
    }

    public function create(){

    	return view('Posts.create');
    } 

    public function store(){

        $this->validate(request(), [

            'title' => 'required',

            'body'  => 'required'
        ]);

    	Posts::create([
            'title' => request('title'),

            'body' => request('body'),

            'user_id' => auth()->user()->id
        ]);

    	return redirect('/');

    }       
}
