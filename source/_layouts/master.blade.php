<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $page->title }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" href="{{ mix('/css/main.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Proza+Libre" rel="stylesheet">
    </head>

    <body class="leading-normal bg-grey-lighter antialiased subpixel-antialiased border-t-8 border-red-light">
        <div class="md:max-w-md mx-auto text-lg pt-4 px-4 font-sans">
            <div class="content pb-4 border-b border-grey-light">
                @if($page->path)
                    <a href="/">&larr; Back</a>
                @endif

                @yield('content')
            </div>

            @yield('posts')

            @if($page->path)
                <div class="flex justify-around py-6">
                    @include('_components.twitter-button')
                    @include('_components.edit-github')
                </div>
            @endif
        </div>
    </body>

    <script src="{{ mix('/js/main.js') }}"></script>
</html>
