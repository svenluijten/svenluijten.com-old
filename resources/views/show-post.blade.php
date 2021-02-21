<x-layout title="{{ $post->title() }} — Sven Luijten" :post="$post">
    <article class="container mx-auto | dark:text-indigo-100">
        <div class="mx-auto w-full py-4 px-6 | lg:w-3/5 md:py-12 lg:px-0">
            <header>
                <h1 class="text-4xl font-bold text-center">{{ $post->title() }}</h1>
                <x-post-meta class="mt-4 text-center" :post="$post" />
            </header>

            <hr class="my-8 | dark:border-gray-900">

            <main>
                <x-markdown anchors flavor="github" class="post">
                    {!! $post->body() !!}
                </x-markdown>
            </main>

            <footer class="mt-8">
                @if($previous = $post->previous())
                    <div class="flex justify-between items-center mb-6">
                        <hr class="flex-1 border-indigo-100 | dark:border-gray-900">
                        <div class="text-center text-sm text-gray-600 px-2 | dark:text-indigo-100">Previous Post</div>
                        <hr class="flex-1 border-indigo-100 | dark:border-gray-900">
                    </div>

                    <x-post-card :post="$previous"/>
                @elseif($next = $post->next())
                    <div class="flex justify-between items-center mb-6">
                        <hr class="flex-1 border-indigo-100 | dark:border-gray-900">
                        <div class="text-center text-sm text-gray-600 px-2 | dark:text-indigo-100">Next Post</div>
                        <hr class="flex-1 border-indigo-100 | dark:border-gray-900">
                    </div>

                    <x-post-card :post="$next"/>
                @endif
            </footer>
        </div>
    </article>
</x-layout>
