<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GCAPVN | Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/front_images/favicon.ico') }}"/>
	{{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/backend_images/logo.ico') }}" /> --}}

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/front_css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/style.css') }}">
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Preloader Start -->
    @include('layouts.front_layout.header')

    @yield('content')

    @include('layouts.front_layout.footer')

    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="{{ asset('js/front_js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('js/front_js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/front_js/popper.min.js') }}"></script>
    <script src="{{ asset('js/front_js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('js/front_js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('js/front_js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/front_js/slick.min.js') }}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('js/front_js/wow.min.js') }}"></script>
    <script src="{{ asset('js/front_js/animated.headline.js') }}"></script>
    <script src="{{ asset('js/front_js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('js/front_js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/front_js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/front_js/jquery.sticky.js') }}"></script>
    
    <!-- contact js -->
    <script src="{{ asset('js/front_js/contact.js') }}"></script>
    <script src="{{ asset('js/front_js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/front_js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/front_js/mail-script.js') }}"></script>
    <script src="{{ asset('js/front_js/jquery.ajaxchimp.min.js') }}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('js/front_js/plugins.js') }}"></script>
    <script src="{{ asset('js/front_js/main.js') }}"></script>

    

</body>
</html>
