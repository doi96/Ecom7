@extends('layouts.front_layout.master')
@section('content')

<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>
                            {{__('label.DistributorList')}}
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
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-north" role="tabpanel" aria-labelledby="v-pills-north-tab">
                            <?php $i = 1; ?>
                            @foreach ($distri_north as $item)
                                <article class="blog_item">
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="#">
                                            <h2>{{$i}}. {{ $item->name }}</h2>
                                        </a>
                                        <h3 class="date">{{__('label.address')}}:  <span style="color: green">{{ $item->address }} </span></h3>
                                        <h5 class="date">{{__('label.phone')}}: <span style="color: green">{{ $item->phone }}</span> </h5>
                                        <ul>
                                            <h5 class="date">Website: <span style="color: green">{{ $item->website }} </span></h5>
                                        </ul>
                                    </div>
                                </article>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="v-pills-middle" role="tabpanel" aria-labelledby="v-pills-middle-tab">
                            <?php $i = 1; ?>
                            @foreach ($distri_middle as $item)
                                <article class="blog_item">
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="#">
                                            <h2>{{$i}}. {{ $item->name }}</h2>
                                        </a>
                                        <h3 class="date">{{__('label.address')}}:  <span style="color: green">{{ $item->address }} </span></h3>
                                        <h5 class="date">{{__('label.phone')}}: <span style="color: green">{{ $item->phone }}</span> </h5>
                                        <ul>
                                            <h5 class="date">Website: <span style="color: green">{{ $item->website }} </span></h5>
                                        </ul>
                                    </div>
                                </article>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="v-pills-south" role="tabpanel" aria-labelledby="v-pills-south-tab">
                            <?php $i = 1; ?>
                            @foreach ($distri_south as $item)
                                <article class="blog_item">
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="#">
                                            <h2>{{$i}}. {{ $item->name }}</h2>
                                        </a>
                                        <h3 class="date">{{__('label.address')}}:  <span style="color: green">{{ $item->address }} </span></h3>
                                        <h5 class="date">{{__('label.phone')}}: <span style="color: green">{{ $item->phone }}</span> </h5>
                                        <ul>
                                            <h5 class="date">Website: <span style="color: green">{{ $item->website }} </span></h5>
                                        </ul>
                                    </div>
                                </article>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="v-pills-orther" role="tabpanel" aria-labelledby="v-pills-orther-tab">
                            <?php $i = 1; ?>
                            @foreach ($distri_orther as $item)
                                <article class="blog_item">
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="#">
                                            <h2>{{$i}}. {{ $item->name }}</h2>
                                        </a>
                                        <h3 class="date">{{__('label.address')}}:  <span style="color: green">{{ $item->address }} </span></h3>
                                        <h5 class="date">{{__('label.phone')}}: <span style="color: green">{{ $item->phone }}</span> </h5>
                                        <ul>
                                            <h5 class="date">Website: <span style="color: green">{{ $item->website }} </span></h5>
                                        </ul>
                                    </div>
                                </article>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @include('layouts.front_layout.search_distributor')
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">{{__('label.category')}}</h4>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-north-tab" data-toggle="pill" href="#v-pills-north" role="tab" aria-controls="v-pills-north" aria-selected="true">{{__('label.north')}}</a>
                                <a class="nav-link" id="v-pills-middle-tab" data-toggle="pill" href="#v-pills-middle" role="tab" aria-controls="v-pills-middle" aria-selected="false">{{__('label.middle')}}</a>
                                <a class="nav-link" id="v-pills-south-tab" data-toggle="pill" href="#v-pills-south" role="tab" aria-controls="v-pills-south" aria-selected="false">{{__('label.south')}}</a>
                                <a class="nav-link" id="v-pills-orther-tab" data-toggle="pill" href="#v-pills-orther" role="tab" aria-controls="v-pills-orther" aria-selected="false">{{__('label.otherarea')}}</a>
                            </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
