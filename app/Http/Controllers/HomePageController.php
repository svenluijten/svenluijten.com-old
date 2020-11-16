<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function __invoke()
    {
        $posts = [
            ['title' => 'Introducing Artisan Shortcuts', 'date' => '2019-01-10', 'slug' => 'introducing-artisan-shortcuts', 'excerpt' => 'Simplifying the execution of multiple artisan commands'],
        ];

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
