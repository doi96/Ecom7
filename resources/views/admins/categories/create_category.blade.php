@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Create Category
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('admin.category.store') }}" method="POST">@csrf
                    <div class="form-group">
                        <label for="category_name">Catogory Name</label>
                        <input name="category_name" type="text" class="form-control" id="category_name" placeholder="Category name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category Parent</label>
                        <select class="form-control" id="parent_id" name="parent_id" >
                        <option value=""> -- Main Category -- </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Activate
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="feature" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                        <label class="form-check-label" for="feature">
                            Feature
                        </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection