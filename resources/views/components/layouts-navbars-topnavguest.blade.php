<div>
    <!-- Topnav Guest -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="javascript:void(0);"> <img src="{{ asset('argon') }}/img/brand/bg-dtbs.png"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="javascript:void(0);"> <img src="{{ asset('argon') }}/img/brand/bg-dtbs.png"> </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation"> <span></span> <span></span> </button>
                        </div>
                    </div>
                </div>

                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ env('SOCIAL_FACEBOOK') }}" target="_blank" data-toggle="tooltip" data-original-title="Sukai kita di facebook"> <i class="fab fa-facebook-square"></i> <span class="nav-link-inner--text d-lg-none">Facebook</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ env('SOCIAL_INSTAGRAM') }}" target="_blank" data-toggle="tooltip" data-original-title="Ikuti info menarik kita di instagram"> <i class="fab fa-instagram"></i> <span class="nav-link-inner--text d-lg-none">Instagram</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ env('SOCIAL_TWITTER') }}" target="_blank" data-toggle="tooltip" data-original-title="Ikuti kita di twitter"> <i class="fab fa-twitter-square"></i> <span class="nav-link-inner--text d-lg-none">Twitter</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ env('SOCIAL_YOUTUBE') }}" target="_blank" data-toggle="tooltip" data-original-title="Subscribe kita di youtube"> <i class="fab fa-youtube"></i> <span class="nav-link-inner--text d-lg-none">Github</span> </a>
                    </li>
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a href="{{ config('app.author/instagram') }}" target="_blank" class="btn btn-neutral btn-icon"> <span class="btn-inner--icon">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            </span> <span class="nav-link-inner--text"> Hubungi pengembang </span> 
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>