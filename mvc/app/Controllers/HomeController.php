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

    //Xóa
    public function destroy($id)
    {
        Product::delete($id);
    }

    //Cập nhật
    public function update($id)
    {
        $data = [
            'name' => 'Test update',
            'image' => 'noimage.jpg',
            'description' => 'Mô tả',
            'price' => 100,
            'stock' => 200,
            'category_id'   => 2
        ];
        Product::update($id, $data);
    }

    public function join()
    {
        $products = Product::select('products.*', 'categories.name as cate_name')
            ->join('categories', 'products', 'id', 'category_id')
            ->get();
        dd($products);
    }
}
