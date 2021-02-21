<x-layout title="Hello, World">
    <main class="container mx-auto">
        <div class="mx-auto w-full px-6 leading-relaxed text-xl | lg:w-3/5 lg:px-0 dark:text-gray-100">
            <div class="flex flex-col justify-center items-center lg:flex-row">
                <img src="{{ asset('images/sven@2x.jpg') }}"
                     alt="A headshot of an insanely handsome developer looking just past the camera with a strapping smile."
                     class="w-64 h-64 my-4 rounded-full border-4 border-gray-100 shadow | lg:my-0 lg:-ml-24 lg:w-48 lg:h-48 dark:border-gray-700"
                >

                <div class="lg:px-4">
                    <h1 class="text-3xl font-bold">Hi 👋 — My name is Sven Luijten</h1>
                    <p class="mb-4">
                        and I am a full stack developer for the web. I got my start in the 
                        <a class="link" href="https://laravel.com">Laravel framework</a>, which I am still a big fan
                        of to this day! I try to be active in the online communities on <a href="https://twitter.com/svenuijten" class="link">Twitter</a>,
                        often <a href="https://github.com/svenluijten" class="link">contribute to open source projects and packages</a>,
                        and also <a href="https://github.com/svenluijten?tab=repositories" class="link">maintain several of my own</a>.
                    </p>
                </div>
            </div>

            <p class="mb-4">
                My aim is to write elegant, easy-to-follow, and maintainable code, always using the best tool for the job.
                So far, I have had the privilege of working with a lot of tools and technologies, including:
            </p>

            <blockquote class="border-l-4 border-gray-300 pl-3 mb-4">
                PHP, Java, Golang, Javascript, Laravel, Docker, Git, MySQL, TailwindCSS, Vue.js, React, Kubernetes,
                Spring Boot, GitHub, GitLab, Jira, PhpStorm, REST APIs, OpenAPI, Postman, StoplightIO, ...
            </blockquote>

            <p class="mb-4">
                When I have the itch, I will publish my writing on <a href="/" class="link">my blog</a>. These posts
                may range from random thoughts I had while in the shower, to articles other developers may find useful.
                I promise to try and limit the showerthoughts to <a href="https://twitter.com/svenluijten" class="link">Twitter</a>,
                though!
            </p>

            <p class="mb-4">
                If you want to know what hard- and software I use on a day-to-day basis, feel free to check out my
                <a href="/uses" class="link">uses page</a>.
            </p>

            <p class="mb-4">
                If you would like to get in touch, you can do so <a href="mailto:contact@svenluijten.com" class="link">via email</a>,
                or come and say "hi" to me on <a href="https://twitter.com/svenluijten" class="link">Twitter</a>! You can
                also visit <a href="https://github.com/svenluijten" class="link">my GitHub profile</a> to see my contributions
                and open source libraries I have developed over time.
            </p>

            <x-note>
                if you spot any tyop on this site,
                <a href="https://github.com/svenluijten/svenluijten.com" class="link">it is open source</a>, so feel free
                submit a pull request to fix it!
            </x-note>
        </div>
    </main>
</x-layout>
