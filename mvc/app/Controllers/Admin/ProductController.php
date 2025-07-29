<?php

namespace App\Controllers\Admin;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        //lấy sản phẩm
        $products = Product::allProduct();
        return view('admin.products.index', compact('products'));
    }
}
