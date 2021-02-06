<article class="mb-8">
    <header class="text-3xl font-extrabold mb-1">
        <h2>
            <a href="{{ $post->slug() }}" class="border-b-4 border-indigo-200 hover:text-white hover:bg-indigo-500 hover:border-indigo-600">
                {{ $post->title() }}
            </a>
        </h2>
    </header>

    <section class="text-gray-800 text-xl mb-2">
        <p>{!! $post->excerpt() !!}</p>
    </section>

    <footer>
        <x-post-meta :post="$post" />
    </footer>
</article>
