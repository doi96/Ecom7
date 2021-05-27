@extends('layouts.front_layout.master')
@section('content')

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{__('label.listproduct')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>                                                      
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach($getCategories as $getCategory)
                                <a class=" nav-item nav-link @if ($getCategory->id==$IdActive) active @endif " id="nav-category-tab-{{$getCategory->id}}" data-toggle="tab" href="#nav-category-{{$getCategory->id}}" role="tab" aria-controls="nav-category-{{$getCategory->id}}" @if ($getCategory->id==$IdActive) aria-selected="true" @else aria-selected="false" @endif>{{$getCategory->name}}</a>
                                @endforeach
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                    
                </div>
                <hr>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    @foreach($getCategories as $getCategory)
                        <div class="tab-pane fade @if ($getCategory->id==$IdActive) show active @endif " id="nav-category-{{$getCategory->id}}" role="tabpanel" aria-labelledby="nav-category-tab-{{$getCategory->id}}">
                            <div class="row">
                                @foreach ($getCategory->products as $item)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="single-popular-items mb-50 text-center">
                                            <div class="popular-img">
                                                <img src="{{ asset('images/front_images/product/small/'.$item->image) }}" alt="">
                                                <div class="img-cap">
                                                    <a href="{{ route('user.product.detail',$item->id) }}"><span>{{__('label.viewdetail')}}</span></a>
                                                </div>
                                                <div class="favorit-items">
                                                    <span class="flaticon-heart"></span>
                                                </div>
                                            </div>
                                            <div class="popular-caption">
                                                <h3><a href="{{ route('user.product.detail',$item->id) }}">{{ $item->name }}</a></h3>
                                                <span>{{__('label.contactprice')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->
        <!--? Shop Method Start-->
        
        <!-- Shop Method End-->

@endsection
    