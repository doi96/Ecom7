@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> Export Excel</a> --}}
            <a href="{{ route('admin.distributor.add') }}" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Distributor</a> 
        </div>
       @if (Session::has('success_message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('success_message') }}</strong>
        </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Area</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($distributions as $distribution)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $distribution->name }}</td>
                                <td>{{ $distribution->area }}</td>
                                <td>{{ $distribution->address }}</td>
                                <td>{{ $distribution->website }}</td>
                                <td>{{ $distribution->phone }}</td>
                                <td>
                                    @if ($distribution->status==1)
                                        <button class="btn btn-success">Active</button>
                                    @else
                                        <button class="btn btn-danger">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary" href="#" data-toggle="modal" data-target="#editModal-{{$distribution->id}}">
                                        <i class="fa fa-wrench" aria-hidden="true"></i> Edit
                                    </button>
                                    <button class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal-{{$distribution->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        
                            {{-- Modal edit --}}
                            <div class="modal fade" id="editModal-{{ $distribution->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Distributor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.distributor.update',$distribution->id) }}" method="POST">@csrf
                                                <div class="form-group">
                                                    <label for="name">Distributor Name</label>
                                                    <input name="name" type="text" class="form-control" id="name" value="{{ $distribution->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Area</label>
                                                    <select class="form-control" id="area" name="area" >
                                                    <option value=""> -- Select Area -- </option>
                                                    <option value="south" @if($distribution->area=='south') selected @endif>South</option>
                                                    <option value="north" @if($distribution->area=='north') selected @endif>North</option>
                                                    <option value="middle" @if($distribution->area=='middle') selected @endif>Middle</option>
                                                    <option value="orther" @if($distribution->area=='orther') selected @endif>Orther</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea name="address" class="form-control" id="address" rows="3">{{ $distribution->address }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone"> Phone</label>
                                                    <input name="phone" type="text" class="form-control" id="phone" value="{{ $distribution->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="website">Website</label>
                                                    <input name="website" type="text" class="form-control" id="website" value="{{ $distribution->website }}">
                                                </div>
                                                <div class="form-check">
                                                    <input name="status" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" @if($distribution->status==1) checked @endif>
                                                    <label class="form-check-label" for="defaultCheck1">
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
                            <div class="modal fade" id="deleteModal-{{$distribution->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                            <a class="btn btn-danger" href="{{ route('admin.distributor.delete',$distribution->id) }}">Delete</a>
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
