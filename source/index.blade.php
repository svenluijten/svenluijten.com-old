---
image: /assets/images/blog-cover.png
pagination:
    collection: posts
---

@extends('_layouts.master')

@section('body')

    @include('_partials.header')

    <main id="site-main" class="site-main outer">
        <div class="inner">
            <div class="post-feed">
                @foreach ($pagination->items as $post)
                    @include('_partials.post-card', ['postCardLarge' => ($loop->first || (($loop->index % 6) === 0))])
                @endforeach
            </div>
        </div>
    </main>
@endsection
