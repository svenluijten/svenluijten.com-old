<?php

namespace App\Http\Controllers;

use App\Post;

class HomePageController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all()->filter(function (Post $post) {
            return $post->date()->lessThanOrEqualTo(now());
        });

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
