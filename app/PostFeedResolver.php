<?php

namespace App;

class PostFeedResolver
{
    public static function createFeed()
    {
        return Post::all()
            ->filter(function (Post $post) {
                return $post->date()->lessThanOrEqualTo(now());
            })
            ->sortByDesc(function(Post $post) {
                return $post->date()->timestamp;
            });
    }
}
