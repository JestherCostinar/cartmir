<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\ProductModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'order_count' => $this->orderModel->countAllResults(),
            'product_count' => $this->productModel->countAllResults(),
        ];

        return view('Admin/dashboard', $data);
    }

    public function product() {
        $data = [
            'title' => 'Product'
        ];

        return view('Admin/products', $data);
    }

    
}
