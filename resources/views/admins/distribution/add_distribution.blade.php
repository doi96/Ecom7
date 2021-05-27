@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Distributors</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Add Distributor
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
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('admin.distributor.store') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="name">Distributor Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Area</label>
                        <select class="form-control" id="area" name="area" >
                        <option value=""> -- Select Area -- </option>
                        <option value="south">South</option>
                        <option value="north">North</option>
                        <option value="middle">Middle</option>
                        <option value="orther">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone"> Phone</label>
                        <input name="phone" type="text" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input name="website" type="text" class="form-control" id="website">
                    </div>
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Activate
                        </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
