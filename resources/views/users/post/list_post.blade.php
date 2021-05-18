@extends('layouts.front_layout.master')
@section('content')

<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>
                            @if ($type=='uses')
                            Công dụng
                            @elseif ($type=='tutorial')
                            Chế biến & bảo quản
                            @elseif ($type=='orther')
                            Bài viết khác
                            @elseif ($type=='news')
                            News
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    
                    @if (count($posts)!=0)
                        @foreach ($posts as $post)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ asset('images/front_images/post/'.$post->image) }}" alt="">
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2>{{ $post->title }}</h2>
                                    </a>
                                    <p class="date">{{ $post->created_at }} </p>
                                    <ul>
                                        <div class="hero__btn" data-animation="fadeInLeft" data-delay=".4s" data-duration="100ms" style="animation-delay: 0.4s;">
                                            <a href="{{ route('user.post.read',[$type,$post->id]) }}" class="btn hero-btn">Xem ngay</a>
                                        </div>
                                    </ul>
                                </div>
                            </article>
                        @endforeach

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                {{ $posts->links() }}
                            </ul>
                        </nav>
                    @else
                        Hiện tại chưa có bài viết nào!
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                    <form action="#">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tìm bài viết" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm bài viết'">
                                <div class="input-group-append">
                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                    </form>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Danh mục</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="{{ route('user.post','uses') }}" class="d-flex">
                                    <p>Công dụng</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.post','tutorial') }}" class="d-flex">
                                    <p>Chế biến & bảo quản</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.post','orther') }}" class="d-flex">
                                    <p>Khác</p>
                                </a>
                            </li>
                        </ul>
                    </aside>
                   
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
