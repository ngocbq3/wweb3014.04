<?php

// Require composer autoloader

use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\ProductController;
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
    });
});

// Run it!
$router->run();
