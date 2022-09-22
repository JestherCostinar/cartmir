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
            'product' => $this->productModel->select('product.id, product.product_name, product.product_desc, product.qty as product_quantity, product.image, product.MRP, product.selling_price, cart.id as cartID, cart.product_id, cart.user_id as cartUserID, cart.qty as cart_quantity, cart.cost')
                                            ->where('product.id', $productID)
                                            ->join('cart', 'cart.product_id = product.id', 'left')
                                            ->first()
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
            $count = $this->cartModel->where('user_id', $user_id)->countAllResults();

            if(count($productDetail) == 1) {
                $oldQyt = $productDetail[0]['qty'];
                $id = $productDetail[0]['id'];
                $newData = [
                    'qty' => $oldQyt + 1,
                ];

                if($this->cartModel->update($id, $newData)) {
                    $cart_item = $this->productModel->select('product.id, product.product_name, product.product_desc, product.qty as product_quantity, product.image, product.MRP, product.selling_price, cart.id as cartID, cart.user_id, cart.qty as cart_quantity, cart.cost')
                        ->where('cart.user_id', session()->get('id'))
                        ->join('cart', 'cart.product_id = product.id')
                        ->findAll();

                    $totalPrice = 0;
                    $totalDiscount = 0;
                    $subTotal = 0;
                    foreach ($cart_item as $item) {
                        $totalPrice += $item['MRP'] * $item['cart_quantity'];
                        $totalDiscount +=  $item['MRP'] - $item['cost'];
                        $subTotal += $item['cost'] * $item['cart_quantity'];
                    }
        
                    $return_arr = array(
                        'status' => 'success',
                        'qty' => $oldQyt + 1,
                        'count' => $count,
                        'totalPrice' => $totalPrice,
                        'totalDiscount' => $totalDiscount,
                        'subTotal' => $subTotal
                    );
                } 
            } else {
                if ($this->cartModel->save($data)) {
                    $cart_item = $this->productModel->select('product.id, product.product_name, product.product_desc, product.qty as product_quantity, product.image, product.MRP, product.selling_price, cart.id as cartID, cart.user_id, cart.qty as cart_quantity, cart.cost')
                        ->where('cart.user_id', session()->get('id'))
                        ->join('cart', 'cart.product_id = product.id')
                        ->findAll();

                    $totalPrice = 0;
                    $totalDiscount = 0;
                    $subTotal = 0;
                    foreach ($cart_item as $item) {
                        $totalPrice += $item['MRP'] * $item['cart_quantity'];
                        $totalDiscount +=  $item['MRP'] - $item['cost'];
                        $subTotal += $item['cost'] * $item['cart_quantity'];
                    }
                    $return_arr = array(
                        'status' => 'success',
                        'qty' => 1,
                        'count' => $count + 1,
                        'totalPrice' => $totalPrice,
                        'totalDiscount' => $totalDiscount,
                        'subTotal' => $subTotal
                    );
                } 
            }
            echo json_encode($return_arr);    
        }
    }

    public function decrement()
    {
        if ($this->request->getMethod() === 'post') {
            $return_arr = array();
            $product_id = $this->request->getPost('productID');
            $user_id = $this->request->getPost('userID');
            $productDetail = $this->cartModel->where('product_id', $product_id)->where('user_id', $user_id)->findAll();
            $count = $this->cartModel->where('user_id', $user_id)->countAllResults();
            $oldQyt = $productDetail[0]['qty'];
            $id = $productDetail[0]['id'];

            if ($oldQyt == 1) {
                if($this->cartModel->where('id', $id)->delete()) {
                    $cart_item = $this->productModel->select('product.id, product.product_name, product.product_desc, product.qty as product_quantity, product.image, product.MRP, product.selling_price, cart.id as cartID, cart.user_id, cart.qty as cart_quantity, cart.cost')
                    ->where('cart.user_id', session()->get('id'))
                        ->join('cart', 'cart.product_id = product.id')
                        ->findAll();

                    $totalPrice = 0;
                    $totalDiscount = 0;
                    $subTotal = 0;
                    foreach ($cart_item as $item) {
                        $totalPrice += $item['MRP'] * $item['cart_quantity'];
                        $totalDiscount +=  $item['MRP'] - $item['cost'];
                        $subTotal += $item['cost'] * $item['cart_quantity'];
                    }
                    
                    $return_arr = array(
                        'status' => 'deleted',
                        'count' => $count - 1,
                        'totalPrice' => $totalPrice,
                        'totalDiscount' => $totalDiscount,
                        'subTotal' => $subTotal       
                    );
                }
            } else {
                $newData = [
                    'qty' => $oldQyt - 1,
                ];

                if ($this->cartModel->update($id, $newData)) {
                    $cart_item = $this->productModel->select('product.id, product.product_name, product.product_desc, product.qty as product_quantity, product.image, product.MRP, product.selling_price, cart.id as cartID, cart.user_id, cart.qty as cart_quantity, cart.cost')
                        ->where('cart.user_id', session()->get('id'))
                        ->join('cart', 'cart.product_id = product.id')
                        ->findAll();

                    $totalPrice = 0;
                    $totalDiscount = 0;
                    $subTotal = 0;
                    foreach ($cart_item as $item) {
                        $totalPrice += $item['MRP'] * $item['cart_quantity'];
                        $totalDiscount +=  $item['MRP'] - $item['cost'];
                        $subTotal += $item['cost'] * $item['cart_quantity'];
                    }

                    $return_arr = array(
                        'status' => 'success',
                        'qty' => $oldQyt - 1,
                        'count' => $count, 
                        'totalPrice' => $totalPrice,
                        'totalDiscount' => $totalDiscount,
                        'subTotal' => $subTotal      
                    );
                } 
            }
            echo json_encode($return_arr);
        }
    }

    public function removeItem()
    {
        if ($this->request->getMethod() === 'post') {
            $return_arr = array();
            $count = $this->cartModel->where('user_id', $this->request->getPost('userID'))->countAllResults();

            if ($this->cartModel->where('id', $this->request->getPost('cartID'))->delete()) {
                $return_arr = array(
                    'status' => 'success',
                    'count' => $count - 1
                );
                echo json_encode($return_arr);
            } 
        }
    }

    public function cart() {
        $data = [
            'title' => 'Cart',
            'categories' => $this->categoryModel->findAll(),
            'cart_count' => $this->cartModel->where('user_id', session()->get('id'))->countAllResults(),
            'cart_item' => $this->productModel->select('product.id, product.product_name, product.product_desc, product.qty as product_quantity, product.image, product.MRP, product.selling_price, cart.id as cartID, cart.user_id, cart.qty as cart_quantity, cart.cost')
                ->where('cart.user_id', session()->get('id'))
                ->join('cart', 'cart.product_id = product.id')
                ->findAll()
        ];

        return view('User/cart', $data);
    }

    public function checkout() {
        $data = [
            'categories' => $this->categoryModel->findAll(),
            'title' => 'Checkout'
        ];

        return view('User/checkout', $data);
    }
}


