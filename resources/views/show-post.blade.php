<x-layout :title="$post->title()">
    <x-slot name="meta">
        {{-- TODO --}}
        <meta name="something" content="this should be rendered in the head">
    </x-slot>

    <article class="container mx-auto">
        <main class="mx-auto w-full py-4 px-6 | lg:w-3/5 md:py-12 lg:px-0">
            <x-markdown anchors flavor="github" class="post">{!! $post->body() !!}</x-markdown>
        </main>
    </article>
</x-layout>
