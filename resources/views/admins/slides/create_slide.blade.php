@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Slides</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Add Slide
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
                <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="category_name">Tilte</label>
                        <input name="title" type="text" class="form-control" id="title">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label for="type_slide">Type slide</label>
                        <select class="form-control" id="type_slide" name="type_slide" >
                            <option > -- Select type -- </option>
                            <option value="orther">Post Other</option>
                            <option value="tutorial">Post Tutorial</option>
                            <option value="uses">Post Uses</option>
                            <option value="news">Post News</option>
                            <option value="product">Product</option>
                            <option value="slide">Slide</option>
                        </select>
                    </div>
                    
                    <div class="form-group" id="post_id">
                        @include('admins.slides.append_link')
                    </div>

                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Activate
                        </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Add Slide</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
