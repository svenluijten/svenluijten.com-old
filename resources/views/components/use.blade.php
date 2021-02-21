@if($attributes->has('title')) 
    <h3 id="{{ $id = Str::slug($attributes->get('title')) }}" class="font-bold">
        <a href="{{ $attributes->get('link', '#'.$id) }}" target="{{ $attributes->has('link') ? '_blank' : '_self' }}" class="link">
            {{ $attributes->get('title') }} 
        </a>
    </h3>
@endif

<p class="mb-4">
    {{ $slot }}
</p>
