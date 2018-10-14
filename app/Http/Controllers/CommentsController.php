<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Posts;

class CommentsController extends Controller
{
    public function store(Posts $post){

            $this->validate(request(), [

                'body'  => 'required'
            ]);

        	Comments::create([
        		'body' => request('body'),
                'posts_id' => $post->id,
                'user_id' => auth()->user()->id
        	]);

        	return back();
    }
}
