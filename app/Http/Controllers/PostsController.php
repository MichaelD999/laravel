<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function show($post)
    {
        $posts = [
            'my-first-post' => 'Hello, this is my first post',
            'my-second-post' => 'now im getting the hang out'
        ];

        return view('post', [
            'post' => $posts[$post]
        ]);
    }
}
