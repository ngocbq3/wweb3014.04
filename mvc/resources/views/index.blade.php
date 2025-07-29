@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3 mb-3">
                    <a href="{{ APP_URL . 'products/' . $product->id . '/show' }}">
                        <h3>{{ $product->name }}</h3>
                    </a>
                    <div class="price">
                        Price: {{ $product->price }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
