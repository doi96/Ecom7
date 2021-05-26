@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            View Product
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <div class="tab-content ml-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                        

                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Product Name</label>
                            </div>
                            <div class="col-md-8 col-6">
                                {{$product->name}}
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Description</label>
                            </div>
                            <div class="col-md-8 col-6">
                                {!! $product->description !!}
                            </div>
                        </div>
                        <hr />
                        
                        
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Category</label>
                            </div>
                            <div class="col-md-8 col-6">
                                {{$product->category->name}}
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Price</label>
                            </div>
                            <div class="col-md-8 col-6">
                                {{ number_format($product->price) }} vnd
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Status</label>
                            </div>
                            <div class="col-md-8 col-6">
                                @if ($product->status==1)
                                    <span style="color: green">Activate</span>
                                @else
                                    <span style="color: red">Inactivate</span>
                                @endif
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Feature</label>
                            </div>
                            <div class="col-md-8 col-6">
                                @if ($product->feature==1)
                                    <span style="color: green">Is feature</span>
                                @else
                                    <span style="color: red">Not feature</span>
                                @endif
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Image</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <img src="{{ asset('images/front_images/product/small/'.$product->image) }}">
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Video</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <video width="640" height="480" controls>
                                    <source src="{{ asset('videos/front_videos/products/'.$product->video) }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <hr />

                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a type="button" class="btn btn-primary" href="{{ route('admin.product.edit',$product->id) }}">Edit</a>
        </div>
    </div>

</div>

@endsection
