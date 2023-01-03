@if($attributes->has('title'))
    <h3 id="{{ $id = Str::slug($attributes->get('title')) }}" class="font-bold">
        <a href="{{ $attributes->get('link', '#'.$id) }}"
           class="link"
           target="{{ $attributes->has('link') ? '_blank' : '_self' }}"
           {{ $attributes->has('link') ? 'rel="noreferrer"' : null }}
        >
            {{ $attributes->get('title') }}
        </a>
    </h3>
@endif

<p class="mb-4">
    {{ $slot }}
</p>
