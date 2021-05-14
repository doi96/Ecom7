@extends('layouts.back_layout.master')
@section('content')
		
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Read Post</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title mb-4">
                                        <div class="d-flex justify-content-start">
                                            
                                            <div class="userData ml-3">
                                                <h6 class="d-block"> Title: {{$post->title}}</h6>
                                                <h6 class="d-block"> Type: {{$post->type}}</h6>
                                                <h6 class="d-block"> Status: @if($post->status==1) <span style="color: green">Active</span> @else <span style="color: red">Inactive</span> @endif </h6>
                                            </div>
                                            <div class="ml-auto">
                                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Image</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Description</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content ml-1" id="myTabContent">
                                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                                <img src="{{ asset('images/front_images/post/'.$post->image) }}">
                                                </div>
                                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    {!! $post->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a type="button" class="btn btn-primary" href="{{ route('admin.post.edit',$post->id) }}">
                <i class="fa fa-wrench" aria-hidden="true"></i> Edit Profile
            </a>
        </div>
    </div>

</div>
@endsection
