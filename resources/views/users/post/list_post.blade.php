@extends('layouts.front_layout.master')
@section('content')

<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>
                            @if (!isset($value) && isset($type))
                                @if ($type=='uses')
                                Công dụng
                                @elseif ($type=='tutorial')
                                Chế biến & bảo quản
                                @elseif ($type=='orther')
                                Bài viết khác
                                @elseif ($type=='news')
                                News
                                @endif
                            @else
                                Kết quả tìm kiếm 
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
                                    <a class="d-inline-block" href="{{ route('user.post.read',[$post->type,$post->id]) }}">
                                        <h2>{{ $post->title }}</h2>
                                    </a>
                                    <p class="date">{{ $post->created_at }} </p>
                                    <ul>
                                        <div class="hero__btn" data-animation="fadeInLeft" data-delay=".4s" data-duration="100ms" style="animation-delay: 0.4s;">
                                            <a href="{{ route('user.post.read',[$post->type,$post->id]) }}" class="btn hero-btn">Xem ngay</a>
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
                    @include('layouts.front_layout.search_post')
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Danh mục</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="{{ route('user.post','news') }}" class="d-flex">
                                    <p>News</p>
                                </a>
                            </li>
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
