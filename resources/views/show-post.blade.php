<x-layout :title="$post->title()">
    <x-slot name="meta">
        {{-- TODO --}}
        <meta name="something" content="this should be rendered in the head">
    </x-slot>

    <article class="container mx-auto">
        <div class="mx-auto w-full py-4 px-6 | lg:w-3/5 md:py-12 lg:px-0">
            <header>
                <h1 class="text-4xl font-bold text-center">{{ $post->title() }}</h1>
                <x-post-meta class="mt-4 text-center" :post="$post" />
                <hr class="my-8">
            </header>

            <main>
                <x-markdown anchors flavor="github" class="post">
                    {!! $post->body() !!}
                </x-markdown>
            </main>
        </div>
    </article>
</x-layout>
