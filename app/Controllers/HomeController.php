<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => ''
        ];

        return view('User/index', $data);
    }
}
