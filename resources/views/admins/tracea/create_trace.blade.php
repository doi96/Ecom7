@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Traceability</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Add Tracea
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
                <form action="{{ route('admin.tracea.store') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="farm_code">Farm code</label>
                        <input name="farm_code" type="text" class="form-control" id="farm_code">
                    </div>
                    <div class="form-group">
                        <label for="farm_address">Farm address</label>
                        <input name="farm_address" type="text" class="form-control" id="farm_address">
                    </div>
                    <div class="form-group">
                        <label for="harvest_date">Harvest date</label>
                        <input name="harvest_date" class="form-control" id="harvest_date" type="text">
                    </div>
                    <div class="form-group">
                        <label for="tank_code"> Water tank code</label>
                        <input name="tank_code" type="text" class="form-control" id="tank_code">
                    </div>
                    <div class="form-group">
                        <label for="packing_date">Packaging date</label>
                        <input name="packing_date" type="text" class="form-control" id="packing_date">
                    </div>
                    <div class="form-group">
                        <label for="lot_code">Lot code</label>
                        <input name="lot_code" type="text" class="form-control" id="lot_code">
                    </div>
                    <div class="form-group">
                        <label for="approval_number">Approval number</label>
                        <input name="approval_number" type="text" class="form-control" id="approval_number">
                    </div>
                    
                    <hr>
                    <button type="submit" class="btn btn-primary">Add Tracea</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
