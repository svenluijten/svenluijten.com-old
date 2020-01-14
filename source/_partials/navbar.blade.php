<nav class="site-nav">
    <div class="site-nav-left">
        @if($page->getPath() !== '/')
            @if($page->logo)
                <a class="site-nav-logo" href="/"><img src="{{ $page->logo }}" alt="{{ $page->siteName }}"/></a>
            @else
                <a class="site-nav-logo" href="/">{{ $page->siteName }}</a>
            @endif
        @endif
        <ul class="nav" role="menu">
            <li class="" role="menuitem"><a href="/">Blog</a></li>
            <li class="" role="menuitem"><a href="/about">About</a></li>
        </ul>
    </div>
    <div class="site-nav-right">
        @foreach($page->socials as $social)
            <a class="social-link social-link-fb"
               href="{{ $social->link }}"
               title="{{ $social->label }}"
               target="_blank"
               rel="noopener"
            >
                <i class="{{ $social->icon }} fa-lg"></i>
            </a>
        @endforeach
        @if($page->subscribe)
            <a class="subscribe-button" href="#subscribe">Subscribe</a>
        @endif
    </div>
</nav>
