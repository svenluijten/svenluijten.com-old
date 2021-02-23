<footer class="container mx-auto">
    <div class="mx-auto w-full flex flex-col items-center justify-between py-4 px-6 | sm:flex-row lg:w-3/5 lg:px-0 md:py-12">
        <div>
            <a href="{{ route('home') }}" class="link">Sven Luijten</a>
            <span class="text-black | dark:text-indigo-100">&copy; {{ date('Y') }}</span>
        </div>

        <nav class="mt-4 flex | sm:mt-0">
            <a href="https://twitter.com/svenluijten" target="_blank" rel="noopener" class="link | sm:ml-4">
                Twitter
            </a>

            <a href="https://github.com/svenluijten" target="_blank" rel="noopener" class="link | ml-4">
                GitHub
            </a>

            <a href="{{ route('feeds.posts') }}" class="link | ml-4">
                RSS
            </a>
        </nav>
    </div>
</footer>
