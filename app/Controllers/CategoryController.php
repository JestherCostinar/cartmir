<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use CodeIgniter\Files\File;

class CategoryController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Category',
            'categories' => $this->categoryModel->findAll()
        ];

        return view('Admin/Category/index', $data);
    }

    public function create() {
        $data = [
            'title' => 'Create Category'
        ];

        if ($this->request->getMethod() === 'post') {
            // Validation Rules
            $validation = $this->validate([
                'category_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Category Name is required'
                    ]
                ],
                'category_image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[category_image]'
                    . '|is_image[category_image]'
                    . '|mime_in[category_image,image/jpg,image/jpeg,image/png]'
                    . '|max_size[category_image, 1000]'
                ]
            ]);

            // Validate
            if(!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $image = $this->request->getFile('category_image');

                if (!$image->hasMoved()) {
                    $file_path =  $image->getRandomName();
                    $image->move('uploads/', $file_path);
              
                    $categoryData = [
                        'category_image' =>  $file_path,
                        'category_name' => $this->request->getPost('category_name'),
                    ];

                    if ($this->categoryModel->save($categoryData)) {
                        $data['Flash_message'] = TRUE;
                    }
                }
            }
        }

        return view('Admin/Category/create', $data);
    }

    public function update($id) {
        $data = [
            'title' => 'Update Category',
            'category' => $this->categoryModel->where('id', $id)->first()
        ];

        if ($this->request->getMethod() === 'post') {
            // Validation Rules
            $validation = $this->validate([
                'category_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Category Name is required',
                    ]
                ],
                'category_image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[category_image]'
                    . '|is_image[category_image]'
                    . '|mime_in[category_image,image/jpg,image/jpeg,image/png]'
                    . '|max_size[category_image, 1000]'
                ]
            ]);

            // Validate
            if (!$validation) {
                $data['validation'] = $this->validator;
            } else {
                $image = $this->request->getFile('category_image');

                if (!$image->hasMoved()) {
                    $file_path =  $image->getRandomName();
                    $image->move('uploads/', $file_path);

                    $categoryData = [
                        'category_image' =>  $file_path,
                        'category_name' => $this->request->getPost('category_name'),
                    ];

                    if ($this->categoryModel->update($id, $categoryData)) {
                        return redirect()->to('category')->with('success', 'Category has been Updated Successfully');
                    }
                }
            }
        }



        return view('Admin/Category/update', $data);
    }
    public function delete($id) {
        if($this->categoryModel->delete($id))
            return redirect()->to('category')->with('success', 'Category has been Deleted');
    }
}
