@extends('layouts.front_layout.master')
@section('content')

<main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Thông tin sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('images/front_images/product/medium/'.$product->image) }}" alt="#" class="img-fluid">
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Thông tin</a>
                                </li>
                                @if (isset($product->video))
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Video</a>
                                    </li>
                                @endif
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                    <div class="row">
                                        <div class="col-md-8 col-6">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @if (isset($product->video))
                                <div class="tab-pane fade text-center" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                    <video width="720" height="480" controls>
                                        <source src="{{ asset('videos/front_videos/products/'.$product->video) }}" type="video/mp4">
                                    </video>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <br>
            </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
</main>

@endsection
