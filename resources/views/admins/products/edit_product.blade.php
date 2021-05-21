@extends('layouts.back_layout.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Edit Product
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
                <form action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input name="product_name" type="text" class="form-control" id="product_name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="category_id" name="category_id" >
                        <option value=""> -- Category -- </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if ($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="descriptionPost" rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_name"> Image</label>
                        <input name="image" type="file" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label for="product_name">Video</label>
                        <input name="video" type="file" class="form-control" id="video">
                    </div>
                    <div class="form-group">
                        <label for="product_name">Price</label>
                        <input name="price" type="number" class="form-control" id="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-check">
                        <input name="status" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" @if ($product->status==1) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                            Activate
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="feature" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" @if ($product->feature==1) checked @endif>
                        <label class="form-check-label" for="feature">
                            Feature
                        </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
