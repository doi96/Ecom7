@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Post</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Create post
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
                <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="product_name">Title</label>
                        <input name="title" type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Type post</label>
                        <select class="form-control" id="type_post" name="type_post" >
                        <option value="0"> -- Select type -- </option>
                            <option value="other">Other</option>
                            <option value="news">News</option>
                            <option value="tutorial">Tutoial</option>
                            <option value="uses">Uses</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="descriptionPost" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_name"> Image</label>
                        <input name="image" type="file" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label for="product_name">Video</label>
                        <input name="video" type="file" class="form-control" id="video">
                    </div>
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Activate
                        </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
