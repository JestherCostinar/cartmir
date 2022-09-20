<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
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
