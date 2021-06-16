@extends('layouts.front_layout.master')
@section('content')

<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>
                            {{__('label.confi')}}
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
                        <div class="tab-pane fade show active" id="v-pills-copyright" role="tabpanel" aria-labelledby="v-pills-copyright-tab">
                            <?php $i = 1; ?>
                            @foreach ($legal_copyright as $item)
                                <article class="blog_item">
                                    <div class="blog_details text-center">
                                        <button href="#" data-toggle="modal" data-target="#viewModal-{{$item->id}}">
                                        <img src="{{ asset('images/front_images/legal/'.$item->name) }}" style="width: 320px;">
                                        </button>
                                    </div>
                                </article>
                                <div class="modal fade" id="viewModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <img src="{{ asset('images/front_images/legal/'.$item->name) }}">
                                    </div>
                                </div>
                                </div>
                            <?php $i++; ?>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="v-pills-confi" role="tabpanel" aria-labelledby="v-pills-confi-tab">
                            <?php $i = 1; ?>
                            @foreach ($legal_certi as $item)
                                <article class="blog_item">
                                    <div class="blog_details text-center">
                                        <button href="#" data-toggle="modal" data-target="#viewModal-{{$item->id}}">
                                        <img src="{{ asset('images/front_images/legal/'.$item->name) }}" style="width: 320px;">
                                        </button>
                                    </div>
                                </article>
                                <div class="modal fade" id="viewModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <img src="{{ asset('images/front_images/legal/'.$item->name) }}">
                                    </div>
                                </div>
                                </div>
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
                                <a class="nav-link active" id="v-pills-copyright-tab" data-toggle="pill" href="#v-pills-copyright" role="tab" aria-controls="v-pills-copyright" aria-selected="true">{{__('label.copyright')}}</a>
                                <a class="nav-link" id="v-pills-confi-tab" data-toggle="pill" href="#v-pills-confi" role="tab" aria-controls="v-pills-confi" aria-selected="false">{{__('label.certification')}}</a>
                            </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
