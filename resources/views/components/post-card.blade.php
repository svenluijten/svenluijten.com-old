<article class="mb-8">
    <header class="text-3xl font-extrabold mb-1">
        <h2>
            <a href="{{ $post->slug() }}" class="border-b-4 border-indigo-200 hover:text-white hover:bg-indigo-600 hover:border-indigo-600">
                {{ $post->title() }}
            </a>
        </h2>
    </header>

    <section class="text-gray-800 text-xl mb-2">
        <p>{!! $post->excerpt() !!}</p>
    </section>

    <footer>
        <small class="text-sm text-gray-700">
            <span>Published on {{ $post->date()->format('F jS, Y') }}</span> &mdash; <strong>Reading time:</strong> 2 minutes
        </small>
    </footer>
</article>
