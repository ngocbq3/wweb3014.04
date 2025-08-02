@extends('layouts.admin')

@section('title', 'Trang chủ của admin')

@section('content')
    <div class="container">
        <form action="{{ APP_URL . 'admin/products/store' }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control">
                @isset($errors['name'])
                    <span class="text-danger">{{ $errors['name'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Name</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" id="" class="form-control">
                @isset($errors['image'])
                    <span class="text-danger">{{ $errors['image'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" name="price" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input type="number" name="stock" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ APP_URL . 'admin/products' }}" class="btn btn-primary">List</a>
            </div>
        </form>
    </div>
@endsection
