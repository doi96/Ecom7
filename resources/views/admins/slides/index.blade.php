@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Slides</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.slider.create') }}" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Slide</a> 
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

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Number</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($slides as $slide)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $slide->title }}</td>
                                <td><img src="{{ asset('images/front_images/slider/'.$slide->image) }}" style="width: 120px;"></td>
                                <td>{{ $slide->description }}</td>
                                <td>{{ $slide->status }}</td>
                                <td>{{ $slide->link }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{ $slide->id }}">
                                        <i class="fa fa-wrench" aria-hidden="true"></i> Edit
                                    </button>
                                    <button class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal-{{$slide->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal-{{ $slide->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Slide</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('admin.slider.edit',$slide->id) }}" method="POST" enctype="multipart/form-data">@csrf
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input value="{{ $slide->title }}" name="title" type="text" class="form-control" id="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Image</label>
                                                <img src="{{ asset('images/front_images/slider/'.$slide->image) }}" style="width: 50%">
                                                <input value="{{ $slide->image }}" name="image" type="file" class="form-control" id="image">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" class="form-control" id="description" rows="3">{{$slide->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Link</label>
                                                <input value="{{ $slide->link }}" name="link" type="text" class="form-control" id="link">
                                            </div>
                                            <div class="form-check">
                                                <input name="status" class="form-check-input" type="checkbox" id="status" value="1" @if($slide->status ==1) checked @endif >
                                                <label class="form-check-label" for="status">
                                                    Activate
                                                </label>
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
                            <!-- Delete Modal-->
                            <div class="modal fade" id="deleteModal-{{$slide->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"><span style="color: red"> Are you sure?</span> Can not restore data after deleting!</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                                            <a class="btn btn-danger" href="{{ route('admin.slider.delete',$slide->id) }}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection
