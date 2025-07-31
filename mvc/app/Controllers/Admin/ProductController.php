<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;

class ProductController
{
    public function index()
    {
        //lấy sản phẩm
        $products = Product::allProduct();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
}
