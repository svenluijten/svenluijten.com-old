<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @include('feed::links')

        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/github.min.css">

        {{ $meta ?? null }}

        <title>{{ $title }}</title>
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
