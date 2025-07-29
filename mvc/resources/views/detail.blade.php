@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container">
        <h2>{{ $product->name }}</h2>
        <div class="price">Price: {{ $product->price }}</div>
        <div class="quantity">Stock: {{ $product->stock }}</div>
        <div>
            {{ $product->description }}
        </div>
    </div>
@endsection
