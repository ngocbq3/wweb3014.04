@extends('layouts.app')
@section('title', 'Đăng ký')

@section('content')
    <h1>Đăng ký thành viên</h1>
    <form action="{{ APP_URL . 'register/store' }}" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="{{ APP_URL . 'login' }}" class="btn btn-primary">Login</a>
        </div>
    </form>
@endsection
