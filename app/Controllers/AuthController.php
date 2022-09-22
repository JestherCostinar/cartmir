<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        if ($this->request->getMethod() === 'post') {

            // Validation
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $userModel = new AuthModel();
                $user = $userModel->where('email', $this->request->getPost('email'))->first();
                $validatePassword = (new Hash)->decrypt($this->request->getPost('password'), $user['password']);

                if (($validatePassword) && ($user['user_type'] === 'user')) {
                    $this->setUserSession($user);
                    return redirect()->to(base_url());
                    
                } else {
                    session()->setFlashData('loginError', 'Email or Password don\'t match');
                    return redirect()->to('/login');
                   
                }
            }
        }
        return view('User/login', $data);
    }

    public function signup()
    {
        $data = [
            'title' => 'Register'
        ];

        if ($this->request->getMethod() === 'post') {

            // Validation
            $rules = [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'confirmPassword' => 'required|matches[password]',
            ];

            $errors = [
                'confirmPassword' => [
                    'matches' => 'Password and confirm password is not match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $userModel = new AuthModel();
                $newData = [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'user_type' => 'user'
                ];
                $userModel->save($newData);
                session()->setFlashData('success', 'Register Successfully');
                return redirect()->to('/login');
            }
        }

        return view('User/signup', $data);
    }

    public function adminLogin() {
        $data = [
            'title' => 'Admin'
        ];

        if ($this->request->getMethod() === 'post') {
            // Validation
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;    
            } else {
                $adminModel = new AuthModel();
                $admin = $adminModel->where('email', $this->request->getPost('email'))
                    ->first();
                $validatePassword = (new Hash)->decrypt($this->request->getPost('password'), $admin['password']);
                if (($validatePassword) && ($admin['user_type'] === 'admin')) {
                    $this->setUserSession($admin);
                    return redirect()->to('/dashboard');
                } else {
                    session()->setFlashData('loginError', 'Email or Password don\'t match');
                    return redirect()->to('/admin');
                }
            }
        }

        return view('Admin/login', $data);
    }

    public function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }

    public function setAdminSession($admin)
    {
        $data = [
            'id' => $admin['id'],
            'name' => $admin['name'],
            'phone' => $admin['phone'],
            'email' => $admin['email'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function adminLogout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
}
