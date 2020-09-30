<!DOCTYPE html>
<html memory-before-exec="{{ round(memory_get_usage()/1048576,2).''.' MB' }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="">
	<meta name="author" content="Creative Tim">
	<title> {{ $pageTitle }} </title>
	<!--  Social tags -->
	<meta name="keywords" content="">
	<meta name="description" content="">
	<!-- Favicon -->
	<link rel="icon" href="{{ asset('argon') }}/img/brand/favicon.png" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<!-- Lib CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

	{{-- Custome CSS --}}
	{{ $cssLib ?? '' }}

	<!-- Argon CSS -->
	<link rel="stylesheet" href="{{ asset('argon') }}/css/argon.min.css?v=1.2.0" type="text/css">
	<!-- Main CSS -->
	{{-- <link rel="stylesheet" href="{{ asset('') }}css/app.min.css" type="text/css"> --}}

</head>

<body class="bg-default">

    {{-- SweetAlert --}}
	{{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.all.min.js"]) --}}

	<!-- Main content -->
	<div class="main-content" id="panel">

        {{-- Call Guest Topnav --}}
        @guest
            <x-layouts-navbars-topnavguest/>
        @endguest

        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        {{ $headers }}
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        
		{{-- Content --}}
		{{ $slot }}
		
	</div>

	{{-- Call Guest Footer --}}
	@guest
        <x-layouts-footers-guest/>
    @endguest

    <!-- Javascript CDN -->
        <!-- Jquery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
        <!-- Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/i18n/id.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    <!-- Javascript Bundle -->
    <script src="{{ asset('') }}js/app.bundle.min.js"></script>
    
	<!-- Optional JS -->
	{{ $jsLib ?? '' }}
	<!-- Argon JS -->
	
	<!-- JS Code Snippet -->
	@stack('js.code')

</body>

</html memory-after-exec="{{ round(memory_get_usage()/1048576,2).''.' MB' }}">