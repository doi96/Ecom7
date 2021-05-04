@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> Export Excel</a> --}}
            <a href="{{ route('admin.product.create') }}" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</a> 
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
                            <th>Category</th>
                            <th>Status</th>
                            <th>Feature</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Feature</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->status }}</td>
                                <td>{{ $product->feature }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <a type="button" class="btn btn-success" href="{{ route('admin.product.read',$product->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.product.edit',$product->id) }}">
                                        <i class="fa fa-wrench" aria-hidden="true"></i> Edit
                                    </a>
                                    <button class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal-{{$product->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        
                            
                            <!-- Delete Modal-->
                            <div class="modal fade" id="deleteModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                            <a class="btn btn-danger" href="{{ route('admin.category.destroy',$product->id) }}">Delete</a>
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
