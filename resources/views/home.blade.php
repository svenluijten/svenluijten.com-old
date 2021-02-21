<x-layout title="Sven Luijten">
    <div class="container mx-auto">
        <div class="mx-auto w-full py-4 px-6 | lg:w-3/5 md:py-12 lg:px-0">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
</x-layout>
