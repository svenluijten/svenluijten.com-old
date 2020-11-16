<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/github.min.css">

        {{ $meta ?? null }}

        <title>{{ $title }}</title>
    </head>

    <body class="font-sans text-base text-gray-900 antialiased border-8 border-gray-300 min-h-screen relative | lg:border-0">
        <x-header/>

        {{ $slot }}

        <x-footer/>
    </body>

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
    <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
</html>
