<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @include('feed::links')

        @include('meta.look')

        <link rel="canonical" href="{{ rtrim(config('app.url'), '/') . request()->getPathInfo() }}">

        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/github.min.css" media="(prefers-color-scheme: light), (prefers-color-scheme: no-preference)">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/dracula.min.css" media="(prefers-color-scheme: dark)">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;800&display=swap" rel="stylesheet">

        <!-- Primary Meta Tags -->
        <title>{{ $title }}</title>
        <meta name="title" content="{{ $title }}">
        <meta name="description" content="{{ isset($post) ? $post->excerpt() : 'Hi 👋 — My name is Sven Luijten, and I am a full stack developer for the web.' }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ rtrim(config('app.url'), '/') . request()->getPathInfo() }}">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="{{ isset($post) ? $post->excerpt() : 'Hi 👋 — My name is Sven Luijten, and I am a full stack developer for the web.' }}">
        <meta property="og:image" content="https://rawcdn.githack.com/svenluijten/assets/HEAD/{{ isset($post) ? $post->slug() : 'misc' }}/card.png">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary">
        <meta property="twitter:url" content="{{ rtrim(config('app.url'), '/') . request()->getPathInfo() }}">
        <meta property="twitter:title" content="{{ $title }}">
        <meta property="twitter:description" content="{{ isset($post) ? $post->excerpt() : 'Hi 👋 — My name is Sven Luijten, and I am a full stack developer for the web.' }}">
        <meta property="twitter:image" content="https://rawcdn.githack.com/svenluijten/assets/HEAD/{{ isset($post) ? $post->slug() : 'misc' }}/card.png">
        <meta property="twitter:creator" content="@svenluijten">
    </head>

    <body class="font-sans text-base text-gray-900 antialiased border-8 border-gray-300 bg-white min-h-screen relative | dark:bg-gray-800 dark:border-gray-900 lg:border-0">
        <x-header/>

        {{ $slot }}

        <x-footer/>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/languages/dockerfile.min.js"></script>
    <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
</html>
