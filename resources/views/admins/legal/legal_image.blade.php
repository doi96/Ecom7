@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Legal Image</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Add Legal Image
        </div>
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
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="{{ route('admin.legal.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Legal Image</label>
                        <input type="file" name="files[]" multiple class="form-control" accept="image/*">
                        @if ($errors->has('files'))
                            @foreach ($errors->get('files') as $error)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error }}</strong>
                            </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type" >
                        <option value="1">Copyright</option>
                        <option value="2">Certification</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
         <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Number</th>
                            <th>Image</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($legal_images as $image)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><img src="{{ asset('images/front_images/legal/'.$image->name) }}" style="width: 240px"></td>
                                <td>
                                    @if($image->type==1)
                                    <button>Copyrigth</button>
                                    @else
                                    <button>Certification</button>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-info" href="#" data-toggle="modal" data-target="#viewModal-{{$image->id}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                    <button class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal-{{$image->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                    
                                </td>
                            </tr>
                        
                            <!-- Delete Modal-->
                            <div class="modal fade" id="deleteModal-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                                            <a class="btn btn-danger" href="{{ route('admin.legal.delete',$image->id) }}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="viewModal-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <img src="{{ asset('images/front_images/legal/'.$image->name) }}">
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