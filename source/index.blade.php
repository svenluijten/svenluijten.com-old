@extends('_layouts.master')

@section('content')
    <h1>Introduction</h1>
    <p>
        My name is Sven Luijten, and I currently work as a PHP developer at <a href="https://stucomm.com">StuComm</a>,
        a startup in Utrecht, The Netherlands. Outside of work, I enjoy photography and long rides on my
        bike.
    </p>

    <h2>Open Source</h2>
    <p>
        I have been active in the Laravel community since around the release of Laravel 5.0, and I have an ever
        growing portfolio of packages.
    </p>

    <p>
        You may have come across <a href="https://github.com/svenluijten/artisan-view">Artisan View</a> in the past,
        which adds a <code>make:view</code> command to your Laravel apps. Have a look on
        <a href="https://github.com/svenluijten">my GitHub profile</a> to see what other projects I have worked on
        and contributed to.
    </p>

    <h2>Get In Touch</h2>
    <p>
        If you want to get in touch, the best way to do so is via <a href="https://twitter.com/svenluijten">Twitter</a>.
        My direct messages are open to everyone, so if you have any questions or would just like a chat, hit me up!
    </p>
@endsection

@section('posts')
    @foreach ($posts->sortByDesc('date') as $post)
        <div class="py-6 border-b border-grey-light">
            <span class="text-grey-darker font-thin block">
                {{ date('F j, Y', $post->date) }}
            </span>
            <a href="{{ $post->getPath() }}" class="text-black font-bold text-xl">
                {{ $post->title }}
            </a>
        </div>
    @endforeach
@endsection
