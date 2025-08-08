<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    //Form login
    public function login()
    {
        return view('auth.login');
    }

    //Post login: xử lý đăng nhập
    public function postLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::where('email', '=', $email);

        //kiểm tra
        if ($user) {
            //Kiểm tra password
            if (password_verify($password, $user->password)) {
                $_SESSION['user'] = $user;
                redirect('admin');
            } else {
                $errors = "Lỗi email hoặc password";
            }
        } else {
            $errors = "Lỗi email hoặc password";
        }
        $errors = $errors ?? '';
        return view('auth.login', compact('errors'));
    }

    //Form register
    public function register()
    {
        return view('auth.register');
    }
    //Add user register
    public function postRegister()
    {
        $data = $_POST;
        //Mã hóa mật khẩu
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        User::create($data);

        $_SESSION['success'] = "Đăng ký tài khoản thành công";
        return redirect('login');
    }
}
