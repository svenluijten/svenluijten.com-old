<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function __invoke(string $slug)
    {
        $post = Post::fromSlug($slug);

        return view('show-post', [
            'post' => $post,
        ]);
    }
}
