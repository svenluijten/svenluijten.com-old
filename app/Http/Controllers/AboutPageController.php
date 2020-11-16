<?php

namespace App\Http\Controllers;

class AboutPageController extends Controller
{
    public function __invoke()
    {
        return view('about');
    }
}
