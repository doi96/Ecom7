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
                            @foreach ($distributor_searchs as $item)
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

                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    {{ $distributor_searchs->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @include('layouts.front_layout.search_distributor')
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
