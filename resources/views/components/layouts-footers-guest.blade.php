<div>
    <!-- Footer Guest -->
    <footer class="py-5" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted"> 
                        &copy; 2020 {{ config('app.name', 'Rezky Maulana') }} Made with ❤️ by 
                        <a href="{{ config('app.author/instagram') }}"> Rezky Maulana </a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item"> <a href="{{ env('SOCIAL_FACEBOOK') }}" class="nav-link" target="_blank"> Facebook </a> </li>
                        <li class="nav-item"> <a href="{{ env('SOCIAL_INSTAGRAM') }}" class="nav-link" target="_blank"> Instagram </a> </li>
                        <li class="nav-item"> <a href="{{ env('SOCIAL_YOUTUBE') }}" class="nav-link" target="_blank"> Youtube </a> </li>
                        <li class="nav-item"> <a href="{{ env('SOCIAL_TWITTER') }}" class="nav-link" target="_blank"> Twitter </a> </li>
                        <li class="nav-item"> <a href="{{ env('APP_ABOUT') }}" class="nav-link" target="_blank"> Tentang Kita </a> </li>
                        <li class="nav-item"> <a href="{{ env('APP_BLOG') }}" class="nav-link" target="_blank"> Berita </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>