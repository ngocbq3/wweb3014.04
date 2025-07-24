<?php

// Require composer autoloader

use App\Controllers\HomeController;

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', function () {
    echo "Welcome PHP2";
});
$router->get('/about', function () {
    echo "About Page";
});
$router->get('/products', HomeController::class . "@index");
$router->get('/products/{id}/show', HomeController::class . "@show");
$router->get('/products/create', HomeController::class . "@create");
$router->get('/products/{id}/delete', HomeController::class . "@destroy");
$router->get('/products/{id}/update', HomeController::class . "@update");
$router->get('/products/join', HomeController::class . "@join");


// Run it!
$router->run();
