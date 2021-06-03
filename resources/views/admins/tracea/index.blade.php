@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tracea</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.tracea.create') }}" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add tracea</a> 
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
                            <th>Tracea Code</th>
                            <th>Farm code</th>
                            <th>Farm address</th>
                            <th>Harvest date</th>
                            <th>Tank</th>
                            <th>Packaging date</th>
                            <th>Lot code</th>
                            <th>Approval</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Number</th>
                            <th>Tracea Code</th>
                            <th>Farm code</th>
                            <th>Farm address</th>
                            <th>Harvest date</th>
                            <th>Tank</th>
                            <th>Packaging date</th>
                            <th>Lot code</th>
                            <th>Approval</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($traces as $trace)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $trace->traceacode }}</td>
                                <td>{{ $trace->farm_code }}</td>
                                <td>{{ $trace->farm_address }}</td>
                                <td>{{ $trace->harvest_date }}</td>
                                <td>{{ $trace->tank_code }}</td>
                                <td>{{ $trace->packing_date }}</td>
                                <td>{{ $trace->lot_code }}</td>
                                <td>{{ $trace->approval_number }}</td>
                                <td>
                                    <button class="btn btn-primary" href="#" data-toggle="modal" data-target="#readModal-{{$trace->id}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> QR code
                                    </button>
                                    <button class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal-{{$trace->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="readModal-{{$trace->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">QR code</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {!! QrCode::size(300)->generate(route('user.tracea',$trace->id)); !!}    
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                                            <a class="btn btn-danger" href="{{ route('admin.tracea.delete',$trace->id) }}">Dowload</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal-{{$trace->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                                            <a class="btn btn-danger" href="{{ route('admin.tracea.delete',$trace->id) }}">Delete</a>
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
