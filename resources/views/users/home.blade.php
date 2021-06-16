<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@if(!empty($meta_title)){{ $meta_title }} @else GCAPVN Website | Trang chủ @endif</title>
    @if(!empty($meta_description))
        <meta name="description" content="{{ $meta_description }}">
    @endif
    @if(!empty($meta_keywords))
        <meta name="keywords" content="{{ $meta_keywords }}">
    @endif
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/front_images/favicon.ico') }}"/>

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
    <link rel="stylesheet" href="{{ asset('css/front_css/slick-theme.min.css') }}">
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
                    <img src="{{ asset('images/front_images/GCapvn.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Preloader Start -->
    @include('layouts.front_layout.header')

    <main>
        <!--? slider Area Start -->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                    @foreach ($slides as $slide)
                        <div class="single-slider slider-height d-flex align-items-center slide-bg">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <div class="hero__caption">
                                                <h1 data-animation="fadeInLeft" data-delay=".2s" data-duration="100ms">{{ $slide->title }}</h1>
                                                <p data-animation="fadeInLeft" data-delay=".4s" data-duration="100ms">{{ $slide->description }}</p>
                                                <!-- Hero-btn -->
                                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".4s" data-duration="100ms">
                                                    @if ($slide->type=='uses'||$slide->type=='orther'||$slide->type=='tutorial'||$slide->type=='news')
                                                        <a href="{{ route('user.post.read',[$slide->type,$slide->link]) }}" class="btn hero-btn">{{__('label.readnow')}}</a>
                                                    @elseif ($slide->type=='product')
                                                        <a href="{{ route('user.product.detail',$slide->link) }}" class="btn hero-btn">{{__('label.readnow')}}</a>
                                                    @else
                                                    
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 d-none d-sm-block"> --}}
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 d-sm-block">
                                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                                <img style="width: 100%;" src="{{ asset('images/front_images/slider/'.$slide->image) }}" alt="" class=" heartbeat">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="carousel-item">
                                    <img src="{{ asset('images/front_images/slider/'.$slide->image) }}" alt="" class=" heartbeat">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $slide->title }}</h5>
                                        <p>{{ $slide->description }}</p>
                                    </div>
                                    </div> --}}
                                </div>
                        </div>
                    @endforeach
            </div>
        </div>
        <!-- slider Area End-->

        <!-- ? New Product Start -->
        <section class="new-product-area section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle mb-70">
                            <h2>{{__('label.newproduct')}}</h2>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        @foreach ($getNewProducts as $getNewProduct)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-new-pro mb-30 text-center">
                                    <div class="product-img">
                                        <img src="{{ asset('images/front_images/product/medium/'.$getNewProduct->image) }}" alt="">
                                    </div>
                                    <div class="product-caption">
                                        <h3><a href="{{ route('user.product.detail',$getNewProduct->id) }}">{{ $getNewProduct->name }}</a></h3>
                                        <span>{{__('label.contactprice')}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </section>
        <!--  New Product End -->
        <!--? Gallery Area Start -->
        <div class="gallery-area">
            <div class="container-fluid p-0 fix">
                <div class="row">
                    <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url(images/front_images/show/5.jpg);"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">

                            <div class="gallery-img big-img" style="background-image: url(images/front_images/show/doc.jpg);"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img small-img" style="background-image: url(images/front_images/show/1.jpg);"></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12  col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <a href="google.com"><div class="gallery-img small-img" style="background-image: url(images/front_images/show/2.jpg);"></div></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Gallery Area End -->
        <!--? Popular Items Start -->
        <div class="popular-items section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>{{__('label.featureproduct')}}</h2>
                            <p>{{__('label.sloganfeatureproduct')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($getFeatureProducts as $getFeatureProduct)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="{{ asset('images/front_images/product/small/'.$getFeatureProduct->image) }}" alt="">
                                    <div class="img-cap">
                                        <a href="{{ route('user.product.detail',$getFeatureProduct->id) }}"><span>{{__('label.viewdetail')}}</span></a>
                                    </div>
                                    <div class="favorit-items">
                                        <a href="{{ route('user.product.detail',$getFeatureProduct->id) }}"><span class="flaticon-heart"></span></a>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="{{ route('user.product.detail',$getFeatureProduct->id) }}">{{ $getFeatureProduct->name }}</a></h3>
                                    <span>{{__('label.contactprice')}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="{{ route('product.all') }}" class="btn view-btn1">{{__('label.allproduct')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Items End -->
        <!--? Video Area Start -->
        <div class="video-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                    <div class="video-wrap">
                        <div class="play-btn "><a class="popup-video" href="https://www.youtube.com/watch?v=4FC85IZSCv0"><i class="fas fa-play"></i></a></div>
                    </div>
                    </div>
                </div>
                <!-- Arrow -->
                <div class="thumb-content-box">
                    <div class="thumb-content">
                        <h3>{{__('label.introduce')}}</h3>
                        <a href="#"> <i class="flaticon-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Area End -->
        <!--? Watch Choice  Start-->
        <div class="watch-area section-padding30">
            <div class="container">
                @if (count($getPost)!=0)
                    @foreach ($getPost as $item)
                        <div class="row align-items-center justify-content-between padding-130">
                            <div class="col-lg-5 col-md-6">
                                <div class="watch-details mb-40">
                                    <h2>{{__('label.newpost')}}</h2>
                                    <p>{{ $item->title}}</p>
                                    <a href="{{ route('user.post.read',[$item->type,$item->id]) }}" class="btn">{{__('label.readnow')}}</a>
                                </div>
                            </div>
                            @if(isset($item->image))
                            <div class="col-lg-6 col-md-6 col-sm-10">
                                <div class="choice-watch-img mb-40">
                                    <img src="{{ asset('images/front_images/post/'.$item->image) }}" alt="">
                                </div>
                            </div>
                            @endif
                        </div>
                    @endforeach
                @endif

                @if (count($getNews)!=0)
                    @foreach ($getNews as $item)
                        <div class="row align-items-center justify-content-between">
                            @if(isset($item->image))
                            <div class="col-lg-6 col-md-6 col-sm-10">
                                <div class="choice-watch-img mb-40">
                                    <img src="{{ asset('images/front_images/post/'.$item->image) }}" alt="">
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-5 col-md-6">
                                <div class="watch-details mb-40">
                                    <h2>{{__('label.hotnews')}}</h2>
                                    <p>{{ $item->title}}</p>
                                    <a href="{{ route('user.post.read',[$item->type,$item->id]) }}" class="btn">{{__('label.readnow')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- Watch Choice  End-->
        
    </main>
	
    <!-- Load Facebook SDK for JavaScript -->
      {{-- <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      </script> --}}
    @include('layouts.front_layout.slide_footer')
    @include('layouts.front_layout.footer')

    <!--? Search model Begin -->
    @include('layouts.front_layout.search_product')
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
    

    <script type="text/javascript">
            $(document).on('ready', function() {
            $(".footer_slider").slick({
                dots: true,
                infinite: true,
                centerMode: true,
                slidesToShow: 5,
                slidesToScroll: 2,
                autoplay: true,
                autoplaySpeed: 1000,
                arrows: true,
                responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2,
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }

                    ]
                
            });
            });
    </script>
    
</body>
</html>
