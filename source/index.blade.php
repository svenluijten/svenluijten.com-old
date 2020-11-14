@extends('_layouts.master')

@section('content')
    <h1>Sven Luijten</h1>
    <p>
        Hi, I'm Sven Luijten&mdash;a PHP/Laravel web developer from the south of The Netherlands, with over 4 years of
        professional working experience.
    </p>

    <p>
        I have been active in the Laravel community since around the release of Laravel 5.0, and I have an ever
        growing portfolio of open source packages to help make developers' lives easier.
    </p>

    <p>
        You may have come across <a href="https://github.com/svenluijten/artisan-view">Artisan View</a> in the past,
        which adds a <code>make:view</code> command to your Laravel apps. Have a look on
        <a href="https://github.com/svenluijten">my GitHub profile</a> to see what other projects I have worked on
        and contributed to.
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
