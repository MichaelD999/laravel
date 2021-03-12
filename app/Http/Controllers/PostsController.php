<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostsController extends Controller
{
    //
    public function show($slug)
    {
//        $post = DB::table('posts')->where('slug', $slug)->first();


//        $posts = [
//            'my-first-post' => 'Hello, this is my first post',
//            'my-second-post' => 'now im getting the hang out'
//        ];

        return view('post', [
            'post' => $post = Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
