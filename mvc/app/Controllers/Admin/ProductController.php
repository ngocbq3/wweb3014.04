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

    public function store()
    {
        // Lấy dữ liệu từ request
        $data = $_POST;

        //Xử lý file
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = "storage/images/" . $file['name'];
            //upload file
            move_uploaded_file($file['tmp_name'], $image);
            //Gán image vào data
            $data['image'] = $image;
        }

        // Validate dữ liệu (nếu cần)

        // Lưu sản phẩm vào cơ sở dữ liệu
        Product::create($data);

        return redirect('admin/products');
    }

    public function delete($id)
    {
        Product::delete($id);
        return redirect('admin/products');
    }
}
