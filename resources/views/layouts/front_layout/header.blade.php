<header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('user.home') }}"><img src="{{ asset('images/front_images/GCapvn.png') }}" alt="" style="width: 90px; high: 45px;"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="{{ route('user.home') }}">{{ __('label.home')}}</a></li>
                                    <li><a href="#">{{ __('label.aboutGCAPVN') }}</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('user.about') }}">{{ __('label.about') }}</a></li>
                                            <li><a href="{{ route('user.legal.view') }}">{{ __('label.confi') }}</a></li>
                                            <li><a href="{{ route('user.distribution') }}">{{ __('label.distributionPolicy') }}</a></li>
                                            <li><a href="{{ route('user.distributor') }}">{{ __('label.DistributorList') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="hot"><a href="{{ route('product.all') }}">{{ __('label.product')}}</a>
                                        <ul class="submenu">
                                            @foreach ($getCategories as $getCategory)
                                                <li><a href="{{ route('product.category',$getCategory->id) }}"> {{ $getCategory->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('user.post','news') }}">{{ __('label.news') }}</a></li>
                                    <li><a href="#">{{__('label.post')}}</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('user.post','uses') }}">{{ __('label.uses')}}</a></li>
                                            <li><a href="{{ route('user.post','tutorial') }}">{{__('label.processingandpreserving')}}</a></li>
                                            <li><a href="{{ route('user.post','orther') }}">{{__('label.orther')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('user.contact') }}">{{__('label.contact')}}</a></li>
                                    
                                </ul>
                            </nav>
                        </div>
                        
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>
                                <li style="margin-right: 10px;"><a href="{!! route('change-language', ['en']) !!}"><img src="{{ asset('icon/united-kingdom.png') }}"> En</a></li>
                                <li><a href="{!! route('change-language', ['vi']) !!}"><img src="{{ asset('icon/vietnam.png') }}">  Vi</a></li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
