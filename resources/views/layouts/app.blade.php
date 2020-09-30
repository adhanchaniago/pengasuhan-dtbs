<!DOCTYPE html>
<html memory-before-exec="{{ round(memory_get_usage()/1048576,2).''.' MB' }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Creative Tim">
	<title> Welcome </title>
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
	@stack('css.lib')

	<!-- Argon CSS -->
	<link rel="stylesheet" href="{{ asset('argon') }}/css/argon.min.css?v=1.2.0" type="text/css">
	<!-- Main CSS -->
	{{-- <link rel="stylesheet" href="{{ asset('') }}css/app.min.css" type="text/css"> --}}

	
</head>

<body class="{{ $class ?? '' }}">
    
    
    {{ $slot }}


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
	@stack('js.lib')
	<!-- Argon JS -->
	
	<!-- JS Code Snippet -->
	@stack('js.code')

</body>

</html memory-after-exec="{{ round(memory_get_usage()/1048576,2).''.' MB' }}">