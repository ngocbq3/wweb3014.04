<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController
{
    public function index()
    {
        $products = Product::all();
        dd($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        dd($product);
    }

    public function create()
    {
        $data = [
            'name' => 'Test create',
            'image' => 'noimage.jpg',
            'description' => 'Mô tả',
            'price' => 100,
            'stock' => 200,
            'category_id'   => 2
        ];
        dd(Product::create($data));
    }
}
