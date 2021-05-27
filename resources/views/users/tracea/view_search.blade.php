@extends('layouts.front_layout.master')
@section('content')

<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>
                            {{__('label.tracea')}}
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
            @if($trace!=null)
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                   <div class="tab-content ml-1" id="myTabContent">
                       <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                            <h4>Truy xuất nguồn gốc / Traceability</h4>
                        </div>
                        <hr>
                        <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                            
                            <div class="row">
                                <div class="col-sm-3 col-md-12 col-8" style="background: #d0cfd3">
                                    <label style="font-weight:bold;">Mã truy xuất / Traceability code</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$trace->traceacode}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-12 col-8" style="background: #d0cfd3">
                                    <label style="font-weight:bold;">Mã số đìa trồng rong / Sea grapes farm code</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$trace->farm_code}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-12 col-8" style="background: #d0cfd3">
                                    <label style="font-weight:bold;">Địa chỉ đìa trồng / Address of farm</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$trace->farm_address}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-12 col-8" style="background: #d0cfd3">
                                    <label style="font-weight:bold;">Ngày thu hoạch  / Harvest date (YYYY/MM/DD)</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$trace->harvest_date}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-12 col-8" style="background: #d0cfd3">
                                    <label style="font-weight:bold;">Mã hồ nuôi / Code of water tank</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$trace->tank_code}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-12 col-8" style="background: #d0cfd3">
                                    <label style="font-weight:bold;">Ngày đóng gói / Packaging date (YYYY/MM/DD)</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$trace->farm_address}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-12 col-8" style="background: #d0cfd3">
                                    <label style="font-weight:bold;">Mã lô / Lot code</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$trace->lot_code}}
                                </div>
                            </div>
                            <hr /><div class="row">
                                <div class="col-sm-3 col-md-12 col-8" style="background: #d0cfd3">
                                    <label style="font-weight:bold;">Mã số nhà máy / Approval number</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{$trace->approval_number}}
                                </div>
                            </div>
                            <hr />
                        </div>
                        
                    </div>

                </div>
            </div>
            @else
            <div class="col-lg-8 mb-5 mb-lg-0">
            <p>Mã sản phẩm (hoặc mã truy xuất) không phù hợp! / Product code (or Traceability code) does not match!</p>
            </div>
            @endif
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @include('layouts.front_layout.search_tracea')
                    @if($trace!=null)
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">QR Code</h4>
                        <ul class="list cat-list text-center">
                            {!! QrCode::size(300)->generate(route('user.tracea',$trace->id)); !!}
                        </ul>
                    </aside>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
