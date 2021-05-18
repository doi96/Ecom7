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
                        <article class="blog_item">
                            <div class="blog_item_img">
                                @if(isset($post->image))
                                <img class="card-img rounded-0" src="{{ asset('images/front_images/post/'.$post->image) }}" alt="">
                                @endif
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="#">
                                    <h2>{{ $post->title }}</h2>
                                </a>
                                <ul>
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".4s" data-duration="100ms" style="animation-delay: 0.4s;">
                                        <p>{!! $post->description !!}</p>
                                    </div>
                                </ul>
                            </div>
                        </article>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">

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
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Bài viết tương tự</h4>
                        <ul class="list cat-list">
                            @foreach ($samePosts as $item)
                                <li>
                                <a href="{{ route('user.post.read',[$type,$item->id]) }}" class="d-flex">
                                    <p>{{$item->title}}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                   
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
