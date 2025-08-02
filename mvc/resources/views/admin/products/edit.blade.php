@extends('layouts.admin')

@section('title', 'Cập nhật sản phẩm')

@section('content')
    <div class="container">
        @if ($success != '')
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
        <form action="{{ APP_URL . 'admin/products/' . $product->id . '/update' }}" method="post"
            enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Name</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @selected($cate->id == $product->category_id)>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label> <br>
                <img src="{{ APP_URL . $product->image }}" width="100" alt=""><br>
                <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" rows="10" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ APP_URL . 'admin/products' }}" class="btn btn-primary">List</a>
            </div>
        </form>
    </div>
@endsection
