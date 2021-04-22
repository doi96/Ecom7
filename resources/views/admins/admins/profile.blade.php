@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Admin Profile</h1>
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
                                            <div class="image-container">
                                                <img src="{{ asset('images/back_images/admin_avatar/'.$admin->avatar) }}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                                <div class="middle">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#images-{{ $admin->id }}">
                                                            <i class="fa fa-wrench" aria-hidden="true"></i> Change avatar
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="userData ml-3">
                                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">{{ auth()->user()->name }}</h2>
                                                <h6 class="d-block"> Email: {{$admin->email}}</h6>
                                                <h6 class="d-block"> Phone: {{$admin->adminProfiles->phone_number}}</h6>
                                            </div>
                                            <div class="ml-auto">
                                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                            </div>
                                        </div>
                                    </div>
                                    @if (Session::has('success_message'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ Session::get('success_message') }}</strong>
                                    </div>
                                    @endif
                            
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content ml-1" id="myTabContent">
                                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                                    

                                                    <div class="row">
                                                        <div class="col-sm-3 col-md-2 col-5">
                                                            <label style="font-weight:bold;">Full Name</label>
                                                        </div>
                                                        <div class="col-md-8 col-6">
                                                            {{$admin->adminProfiles->full_name}}
                                                        </div>
                                                    </div>
                                                    <hr />

                                                    <div class="row">
                                                        <div class="col-sm-3 col-md-2 col-5">
                                                            <label style="font-weight:bold;">Birth Date</label>
                                                        </div>
                                                        <div class="col-md-8 col-6">
                                                            March 22, 1994.
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-3 col-md-2 col-5">
                                                            <label style="font-weight:bold;">Address</label>
                                                        </div>
                                                        <div class="col-md-8 col-6">
                                                            {{$admin->adminProfiles->address}}
                                                        </div>
                                                    </div>
                                                    <hr />

                                                </div>
                                                <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                    Facebook, Google, Twitter Account that are connected to this account
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfile-{{ $admin->id }}">
                <i class="fa fa-wrench" aria-hidden="true"></i> Edit Profile
            </button>
        </div>
    </div>

</div>
<div class="modal fade" id="images-{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change avatar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                
            <div class="modal-body">
                <form action="{{ route('admin.avatar') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProfile-{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change avatar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                
            <div class="modal-body">
                <form action="{{ route('admin.edit.profile') }}" method="POST" >@csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input name="full_name" type="text" class="form-control" id="full_name" placeholder="Your Full Name" value="{{ $admin->adminProfiles->full_name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Your email" value="{{ $admin->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input name="phone" type="text" class="form-control" id="phone" placeholder="Your Phone" value="{{ $admin->adminProfiles->phone_number }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Address</label>
                            <input name="address" type="text" class="form-control" id="address" placeholder="Your Address" value="{{ $admin->adminProfiles->address }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
