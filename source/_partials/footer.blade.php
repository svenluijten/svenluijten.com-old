<footer class="site-footer outer">
    <div class="site-footer-content inner">
        <section class="copyright">
            <a href="{{ $page->baseUrl }}">{{ $page->siteName }}</a>
            &copy; <span id="year"></span>
            <script type="text/javascript">document.getElementById('year').innerText = new Date().getFullYear();</script>
        </section>

        <nav class="site-footer-nav">
            @foreach($page->socials as $social)
                <a href="{{ $social->link }}" target="_blank" rel="noopener">{{ $social->label }}</a>
            @endforeach
            <a href="/feed.xml" target="_blank" rel="noopener">RSS</a>
        </nav>
    </div>
</footer>
