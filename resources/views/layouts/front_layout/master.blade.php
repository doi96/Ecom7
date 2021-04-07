<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/front_css/color-01.css') }}">
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	@include('layouts.front_layout.header')

	<main id="main">
		@yield('content')

	</main>

	@include('layouts.front_layout.footer')
	
	<script src="{{ asset('/js/front_js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('/js/front_js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('/js/front_js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/front_js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('/js/front_js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('/js/front_js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/js/front_js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('/js/front_js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('/js/front_js/functions.js') }}"></script>
</body>
</html>