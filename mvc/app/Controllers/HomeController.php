<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController
{
    public function index()
    {
        $products = Product::all();
        var_dump($products);
    }
}
