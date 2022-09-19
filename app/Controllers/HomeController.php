<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'categories' => $this->categoryModel->findAll(),
            'products' => $this->productModel->findAll()
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

    public function addToCart() {
        if ($this->request->getMethod() === 'post') {
            $return_arr = array();
            $product_id = $this->request->getPost('productID');
            $user_id = $this->request->getPost('userID');
            $data = [
                'product_id' => $product_id,
                'qty' => 1,
                'cost' => $this->request->getPost('price'),
                'user_id' => $user_id
            ];

            $productDetail = $this->cartModel->where('product_id', $product_id)->where('user_id', $user_id)->findAll();
            $count = $this->cartModel->where('user_id', $user_id)->countAll();

            if(count($productDetail) == 1) {
                $oldQyt = $productDetail[0]['qty'];
                $id = $productDetail[0]['id'];
                $newData = [
                    'product_id' => $product_id,
                    'qty' => $oldQyt + 1,
                    'cost' => $this->request->getPost('price'),
                    'user_id' => $user_id
                ];

                if($this->cartModel->update($id, $newData)) {
                    $return_arr = array(
                        'status' => 'success',
                        'qty' => $oldQyt,
                        'count' => $count
                    );
                } else {
                    echo "2";
                }
            } else {
                if ($this->cartModel->save($data)) {
                    $return_arr = array(
                        'status' => 'success',
                        'qty' => 1,
                        'count' => $count+1
                    );
                } else {
                    echo "2";
                }
            }
            echo json_encode($return_arr);    
        }
    }
}


