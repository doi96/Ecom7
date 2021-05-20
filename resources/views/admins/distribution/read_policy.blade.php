@extends('layouts.back_layout.master')
@section('content')
		
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Read Policy</h1>
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
                                                <h6 class="d-block"> Title: {{$policy->title}}</h6>
                                                <h6 class="d-block"> Type: {{$policy->type}}</h6>
                                                <h6 class="d-block"> Status: @if($policy->status==1) <span style="color: green">Active</span> @else <span style="color: red">Inactive</span> @endif </h6>
                                            </div>
                                            <div class="ml-auto">
                                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-12">
                                           
                                            <div class="tab-content ml-1" id="myTabContent">
                                                    {!! $policy->description !!}
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
            <a type="button" class="btn btn-primary" href="{{ route('admin.distribution.policy.edit',$policy->id) }}">
                <i class="fa fa-wrench" aria-hidden="true"></i> Edit Policy
            </a>
        </div>
    </div>

</div>
@endsection
