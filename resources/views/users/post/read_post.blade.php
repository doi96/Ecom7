@extends('layouts.front_layout.master')
@section('content')

<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>
                            @if ($post->type=='uses')
                            Công dụng
                            @elseif ($post->type=='tutorial')
                            Chế biến & bảo quản
                            @elseif ($post->type=='orther')
                            Bài viết khác
                            @elseif ($post->type=='news')
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
                                <p class="date">{{ $post->created_at }} </p>
                                <ul>
                                    <div class="col-12">
                                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Thông tin</a>
                                            </li>
                                            @if (isset($post->video))
                                                <li class="nav-item">
                                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Video</a>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="tab-content ml-1" id="myTabContent">
                                            <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <p>{!! $post->description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (isset($post->video))
                                            <div class="tab-pane fade text-center" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                <video width="720" height="480" controls>
                                                    <source src="{{ asset('videos/front_videos/post/'.$post->video) }}" type="video/mp4">
                                                </video>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </article>

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
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Bài viết tương tự</h4>
                        <ul class="list cat-list">
                            @foreach ($samePosts as $item)
                                <li>
                                <a href="{{ route('user.post.read',[$item->type,$item->id]) }}" class="d-flex">
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
