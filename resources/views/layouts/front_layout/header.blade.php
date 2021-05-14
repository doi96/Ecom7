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
                                    <li><a href="{{ route('user.home') }}">Trang chủ</a></li>
                                    <li><a href="#">Về GCAPVN</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('user.about') }}">Giới thiệu</a></li>
                                            <li><a href="blog-details.html">Chính sách phân phối</a></li>
                                            <li><a href="blog-details.html">Danh sách nhà phân phối</a></li>
                                        </ul>
                                    </li>
                                    <li class="hot"><a href="{{ route('product.all') }}">Sản phẩm</a>
                                        <ul class="submenu">
                                            @foreach ($getCategories as $getCategory)
                                                <li><a href="{{ route('product.category',$getCategory->id) }}"> {{ $getCategory->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="#">Bài viết</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Công dụng</a></li>
                                            <li><a href="blog-details.html">Hướng dẫn sử dụng & bảo quản</a></li>
                                            <li><a href="blog.html">Khác</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('user.contact') }}">Liên hệ</a></li>
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
                                <li> <a href="login.html"><span class="flaticon-user"></span></a></li>
                                <li><a href="cart.html"><span class="flaticon-shopping-cart"></span></a> </li>
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
