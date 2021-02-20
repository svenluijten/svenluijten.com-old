<h3 id="{{ $id = Str::slug($attributes->get('title')) }}">
    <a href="{{ $attributes->get('link', '#'.$id) }}" target="{{ $attributes->has('link') ? '_blank' : '_self' }}" class="link">
        {{ $attributes->get('title') }} 
    </a>
</h3>

<p class="mb-4">
    {{ $slot }}
</p>
