<div class="text-sm text-gray-700 {{ $attributes->get('class') }}">
    <span>Published on {{ $post->date()->format('F jS, Y') }}</span>
    &mdash;
    <span class="italic">{{ $post->minutesToRead() }} minutes to read</span>
</div>
