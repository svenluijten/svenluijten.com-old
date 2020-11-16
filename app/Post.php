<?php

use Illuminate\Support\Carbon;

class Post
{
    protected string $title;
    protected Carbon $date;
    protected string $slug;
    protected string $excerpt;

    public function __construct()
    {
    }
}
