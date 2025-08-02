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

    //Form cập nhâtk
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        //Thông báo của cập nhật
        $success = $_SESSION['success'] ?? '';
        //Xóa session
        unset($_SESSION['success']);
        return view('admin.products.edit', compact('product', 'categories', 'success'));
    }

    //Lưu cập nhật
    public function update($id)
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
        Product::update($id, $data);

        //THông báo bằng session
        $_SESSION['success'] = "Cập nhật dữ liệu thành công";
        //Chuyển về trang cập nhật
        return redirect("admin/products/$id/edit");
    }
}
