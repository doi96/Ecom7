@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Distribution Policy</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Create Policy
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
                <form action="{{ route('admin.distribution.policy.update',$policy->id) }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="product_name">Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{ $policy->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Type policy</label>
                        <select class="form-control" id="type" name="type" >
                        <option value="0"> -- Select type -- </option>
                            <option value="infor" @if($policy->type=='infor') selected @endif>Infor</option>
                            <option value="shipping" @if($policy->type=='shipping') selected @endif>Shipping</option>
                            <option value="commit" @if($policy->type=='commit') selected @endif >Commit</option>
                            <option value="return" @if($policy->type=='return') selected @endif >Return policy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="descriptionPost" rows="3">{{ $policy->description }}</textarea>
                    </div>
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" @if($policy->status==1) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                            Activate
                        </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Update Policy</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
