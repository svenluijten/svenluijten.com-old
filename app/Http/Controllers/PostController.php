<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function __invoke(string $slug)
    {
        $post = [

        ];

        return view('show-post', [
            'post' => $post,
        ]);
    }
}
