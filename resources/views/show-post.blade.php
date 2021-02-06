<x-layout :title="$post->title()">
    <x-slot name="meta">
        {{-- TODO --}}
        <meta name="something" content="this should be rendered in the head">
    </x-slot>

    <div class="container mx-auto">
        <div class="mx-auto w-full py-4 px-6 | lg:w-3/5 md:py-12 lg:px-0">
            <x-markdown anchors flavor="github">{!! $post->body() !!}</x-markdown>
        </div>
    </div>
</x-layout>
