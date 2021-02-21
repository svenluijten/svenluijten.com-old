<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @include('feed::links')

        <link rel="apple-touch-icon" sizes="57x57" href="{{ secure_asset('apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ secure_asset('apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ secure_asset('apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ secure_asset('apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ secure_asset('apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ secure_asset('apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ secure_asset('apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ secure_asset('apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ secure_asset('android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ secure_asset('favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('favicon-16x16.png') }}">
        <link rel="manifest" href="{{ secure_asset('manifest.json') }}">
        <meta name="msapplication-TileColor" content="#4f46e5">
        <meta name="msapplication-TileImage" content="{{ secure_asset('ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#4f46e5">

        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/github.min.css" media="(prefers-color-scheme: light), (prefers-color-scheme: no-preference)">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/dracula.min.css" media="(prefers-color-scheme: dark)">

        {{ $meta ?? null }}

        <!-- Primary Meta Tags -->
        <title>{{ $title }} — Sven Luijten</title>
        <meta name="title" content="{{ $title }}">
        <meta name="description" content="Hi 👋 — My name is Sven Luijten, and I am a full stack developer for the web.">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ request()->url() }}">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="Hi 👋 — My name is Sven Luijten, and I am a full stack developer for the web.">
        <meta property="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ request()->url() }}">
        <meta property="twitter:title" content="{{ $title }}">
        <meta property="twitter:description" content="Hi 👋 — My name is Sven Luijten, and I am a full stack developer for the web.">
        <meta property="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">
    </head>

    <body class="font-sans text-base text-gray-900 antialiased border-8 border-gray-300 bg-white min-h-screen relative | dark:bg-gray-800 dark:border-gray-900 lg:border-0">
        <x-header/>

        {{ $slot }}

        <x-footer/>
    </body>

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/languages/dockerfile.min.js"></script>
    <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
</html>
