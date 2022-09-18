<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'categories' => $this->categoryModel->findAll()
        ];

        return view('User/index', $data);
    }

    public function productList($categoryID) {

        $data = [
            'title' => 'Product List',
            'categories' => $this->categoryModel->findAll(),
            'products' => $this->productModel->where('category_id', $categoryID)->findAll()
        ];

        return view('User/product_list', $data);
    }

    public function details($productID)
    {
        $data = [
            'title' => 'Product Detail',
            'categories' => $this->categoryModel->findAll(),
            'product' => $this->productModel->where('id', $productID)->first()
        ];

        return view('User/details', $data);
    }
}


