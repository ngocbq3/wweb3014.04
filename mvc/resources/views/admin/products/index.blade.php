@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">
                        <a href="{{ APP_URL . 'admin/products/create' }}" class="btn btn-primary">Create</a>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $pro)
                    <tr>
                        <th scope="row">{{ $pro->id }}</th>
                        <td>{{ $pro->name }}</td>
                        <td>
                            <img src="{{ APP_URL . $pro->image }}" width="90" alt="">
                        </td>
                        <td>{{ $pro->price }}</td>
                        <td>{{ $pro->cate_name }}</td>
                        <td>{{ $pro->created_at }}</td>
                        <td>
                            <a href="{{ APP_URL . 'admin/products/' . $pro->id . '/edit' }}"
                                class="btn btn-primary">Edit</a>
                            <form class="d-inline" action="{{ APP_URL . 'admin/products/' . $pro->id . '/delete' }}"
                                method="post">
                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
