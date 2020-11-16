<x-layout title="Hello, World">
    <x-slot name="meta">
        {{-- TODO --}}
        <meta name="something" content="this should be rendered in the head">
    </x-slot>

{{--    <div class="bg-gray-300 | sm:mt-0">--}}
{{--        <main class="container mx-auto">--}}
{{--            <div class="mx-auto w-full py-4 px-6 | lg:w-3/5 md:py-12 lg:px-0">--}}
{{--                <p class="leading-9 text-3xl font-medium mb-8 | md:text-4xl">--}}
{{--                    Freelance <em class="emphasis inline-block transform skew-y-1">Laravel developer</em>, and <em class="emphasis inline-block transform -skew-y-1">open source</em> believer.--}}
{{--                </p>--}}

{{--                <a href="mailto:contact@luijten.dev?subject=Let's chat!" class="emphasis py-4 px-8 inline-block text-xl not-italic | md:mb-0 hover:bg-indigo-700">Get In Touch</a>--}}
{{--            </div>--}}
{{--        </main>--}}
{{--    </div>--}}

    <div class="container mx-auto">
        <div class="mx-auto w-full py-4 px-6 | lg:w-3/5 md:py-12 lg:px-0">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
</x-layout>
