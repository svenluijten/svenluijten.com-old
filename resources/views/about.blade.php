<x-layout title="Hello, World">
    <main class="container mx-auto">
        <div class="mx-auto w-full px-6 leading-9 text-xl font-light | lg:w-3/5 lg:px-0">
            <div class="flex flex-col justify-center items-center lg:flex-row">
                <img src="{{ asset('images/sven.jpg') }}"
                     alt="A kick-ass Laravel developer smiling at the camera."
                     class="w-64 h-64 my-4 rounded-full border-4 border-white shadow | lg:my-0 lg:-ml-24 lg:w-48 lg:h-48 "
                >

                <div class="lg:px-4">
                    <h1 class="text-3xl font-bold">Hi 👋 — My name is Sven Luijten</h1>
                    <p class="mb-4">
                        and I am a backend developer specializing in
                        <a href="https://laravel.com" class="link">the Laravel framework</a>. I am active in the online community surrounding
                        the framework, often contribute to open source projects and packages, and also maintain several of my own.
                    </p>
                </div>
            </div>

            <p class="mb-4">
                My aim is to write elegant, easy-to-follow, and maintainable code, always using the best tool for the job.
                I have had the privilege of working with a lot of tools and technologies, including:
            </p>

            <blockquote class="border-l-4 border-gray-300 pl-3 mb-4">
                PHP, Java, Golang, Javascript, Laravel, Docker, Git, MySQL, TailwindCSS, Vue.js, React, Symfony,
                Kubernetes, Spring Boot, GitHub, GitLab, Jira, PhpStorm, REST APIs, OpenAPI, Postman, StoplightIO, ...
            </blockquote>

            <p class="mb-4">
                {{-- TODO --}}
                When I have the itch, I will publish my writing on <a href="/" class="link">my blog</a>. These posts
                may range from random thoughts I had while in the shower, to articles other developers may find useful.
                I promise to try and limit the showerthoughts to <a href="https://twitter.com/svenluijten" class="link">Twitter</a>,
                though!
            </p>

{{--            <p class="mb-4">--}}
{{--                While I may be a backend developer first, I am not shy of trying something new. At the moment I am expanding--}}
{{--                my knowledge in the world of frontend development, diving head-first into libraries like Angular and React,--}}
{{--                and breaking layouts with CSS and all its auxiliary tooling.--}}
{{--            </p>--}}

            <p class="mb-4">
                If you would like to get in touch, you can do so <a href="mailto:contact@svenluijten.com" class="link">via email</a>,
                or come and say "hi" to me on <a href="https://twitter.com/svenluijten" class="link">Twitter</a>! You can
                also visit <a href="https://github.com/svenluijten" class="link">my GitHub profile</a> to see my contributions
                and open source packages I have developed over time.
            </p>

            <p class="mb-4 text-gray-600">
                <strong>Note</strong>: if you spot any tyop on this site,
                <a href="https://github.com/svenluijten/svenluijten.com" class="link">it is open source</a>, so feel free
                submit a pull request to fix it!
            </p>
        </div>
    </main>
</x-layout>
