@extends('layouts.app')
@section('title', 'Đăng nhập')

@section('content')
    <h1>Login</h1>
    <form action="{{ APP_URL . 'login' }}" method="post">
        @isset($errors)
            <div class="alert alert-danger">{{ $errors }}</div>
        @endisset
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="{{ APP_URL . 'register' }}" class="btn btn-primary">Register</a>
        </div>
    </form>
@endsection
