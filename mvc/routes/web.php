<?php

// Require composer autoloader

use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\ProductController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Trang chủ
$router->get('/', HomeController::class . "@index");
$router->get('/about', function () {
    echo "About Page";
});
$router->get('/products', HomeController::class . "@index");
$router->get('/products/{id}/show', HomeController::class . "@show");
$router->get('/products/create', HomeController::class . "@create");
$router->get('/products/{id}/delete', HomeController::class . "@destroy");
$router->get('/products/{id}/update', HomeController::class . "@update");
$router->get('/products/join', HomeController::class . "@join");

//Router cho Admin
$router->get('/admin', DashboardController::class . '@index');

$router->mount('/admin', function ()  use ($router) {
    $router->mount('/products', function () use ($router) {
        $router->get('/', ProductController::class . "@index");
        $router->get('/create', ProductController::class . "@create");
        $router->post('/store', ProductController::class . "@store");
        $router->post('/{id}/delete', ProductController::class . "@delete");

        //form edit
        $router->get('/{id}/edit', ProductController::class . "@edit");
        //lưu cập nhật
        $router->post('/{id}/update', ProductController::class . "@update");
    });
});

$router->before('GET|POST', '/admin/.*', function () {
    if (!isset($_SESSION['user'])) {
        redirect('login');
        exit();
    }
});
//Login, Register
$router->get('/login', AuthController::class . "@login");
$router->post('/login', AuthController::class . "@postLogin");
$router->get('/register', AuthController::class . "@register");
$router->post('/register/store', AuthController::class . "@postRegister");

// Run it!
$router->run();
