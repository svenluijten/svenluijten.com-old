<div class="text-sm text-gray-700 {{ $attributes->get('class') }} | dark:text-indigo-100">
    <span>Published on {{ $post->date()->format('F jS, Y') }}</span>
    &mdash;
    <span class="italic">
        {{ $post->minutesToRead() }} {{ \Illuminate\Support\Str::plural('minute', $post->minutesToRead()) }} to read
    </span>
</div>
