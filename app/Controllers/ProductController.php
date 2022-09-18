<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Product',
            'categories' => (new CategoryModel)->findAll(),
            'products' => $this->productModel->findAll()
        ];

        return view('Admin/Product/index', $data);
    }

    public function create() {
        $data = [
            'title' => 'Product',
            'categories' => (new CategoryModel)->findAll(),
        ];

        if ($this->request->getMethod() === 'post') {
            // Validation Rules
            $validation = $this->validate([
                'category_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Category is required'
                    ]
                ],
                'product_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Product Name is required'
                    ]
                ],
                'MRP' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'MRP is required'
                    ]
                ],
                'selling_price' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Selling Price is required',
                    ]
                ],
                'qty' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Quantity is required',
                    ]
                ],
                'product_image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[product_image]'
                    . '|is_image[product_image]'
                    . '|mime_in[product_image,image/jpg,image/jpeg,image/png]'
                    . '|max_size[product_image, 100]'
                ]
            ]);

            // Validate
            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $image = $this->request->getFile('product_image');

                if (!$image->hasMoved()) {
                    $file_path =  $image->getRandomName();
                    $image->move('uploads/', $file_path);

                    $productData = [
                        'image' =>  $file_path,
                        'product_name' =>   $this->request->getPost('product_name'),
                        'product_desc' =>   $this->request->getPost('product_desc'),
                        'qty' =>            $this->request->getPost('qty'),
                        'MRP' =>            $this->request->getPost('MRP'),
                        'selling_price' =>  $this->request->getPost('selling_price'),
                        'category_id' =>    $this->request->getPost('category_id'),
                    ];

                    if ($this->productModel->save($productData)) {
                        return redirect()->to('product')->with('success', 'Product has been Save Successfully');
                    }
                }
            }
        }
        return view('Admin/Product/create', $data);
    }

    public function update($id) {
        $data = [
            'title' => 'Update Product',
            'categories' => (new CategoryModel)->findAll(),
            'product' => $this->productModel->where('id', $id)->first()
        ];

        if ($this->request->getMethod() === 'post') {
            // Validation Rules
            $validation = $this->validate([
                'category_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Category is required'
                    ]
                ],
                'product_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Product Name is required'
                    ]
                ],
                'MRP' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'MRP is required'
                    ]
                ],
                'selling_price' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Selling Price is required',
                    ]
                ],
                'qty' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Quantity is required',
                    ]
                ],
                'product_image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[product_image]'
                    . '|is_image[product_image]'
                    . '|mime_in[product_image,image/jpg,image/jpeg,image/png]'
                    . '|max_size[product_image, 1000]'
                ]
            ]);


            // Validate
            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $image = $this->request->getFile('product_image');

                if (!$image->hasMoved()) {
                    $file_path =  $image->getRandomName();
                    $image->move('uploads/', $file_path);

                    $productData = [
                        'image' =>  $file_path,
                        'product_name'  =>   $this->request->getPost('product_name'),
                        'product_desc'  =>   $this->request->getPost('product_desc'),
                        'qty'           =>   $this->request->getPost('qty'),
                        'MRP'           =>   $this->request->getPost('MRP'),
                        'selling_price' =>   $this->request->getPost('selling_price'),
                        'category_id'   =>   $this->request->getPost('category_id'),
                    ];

                    if ($this->productModel->update($id, $productData)) {
                        return redirect()->to('product')->with('success', 'Product has been Updated Successfully');
                    }
                }
            }
        }
        return view('Admin/Product/update', $data);
    }

    public function delete($id) {
        if($this->productModel->delete($id))
            return redirect()->to('product')->with('success', 'Product has been Deleted');
    }
}
