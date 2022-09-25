<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\AuthModel;
use App\Models\CategoryModel;
use App\Models\VerificationModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'categories' => (new CategoryModel())->findAll(),
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
                if($user) {
                    $validatePassword = (new Hash)->decrypt($this->request->getPost('password'), $user['password']);
                    if (($validatePassword) && ($user['user_type'] === 'user') && ($user['is_verify']) == 1) {
                        $this->setUserSession($user);
                        return redirect()->to(base_url());
                    } else {
                        session()->setFlashData('loginError', 'Email or Password don\'t match');
                        return redirect()->to('/login');
                    }
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
            'title' => 'Register',
            'categories' => (new CategoryModel())->findAll(),
        ];

        if ($this->request->getMethod() === 'post') {

            // Validation
            $rules = [
                'firstname' => 'required',
                'lastname' => 'required',
                // 'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
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
                $lastInsertedID = $userModel->getInsertID();
                if((new VerificationModel)->save(['user_id' => $lastInsertedID])) {
                    session()->set(['account_to_verify' => $lastInsertedID]);
                    session()->setFlashData('success', 'Registered successfully. Please verify your account');
                    return redirect()->to('/verify-account');
                }
            }
        }

        return view('User/signup', $data);
    }

    public function verifyAccount() {
        $verifyData = (new VerificationModel)->where('user_id', session()->get('account_to_verify'))->first();
        $recipientData = (new AuthModel)->where('id', $verifyData['user_id'])->first();
        
        $this->sendVerification($recipientData['email'], $verifyData['verification_code']);
        
        $data = [
            'title' => 'Verify Account',
            'categories' => (new CategoryModel())->findAll(),
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'code' => 'required',
                
            ];
            $errors = [
                'code' => [
                    'required' => 'Verification Code is required'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                if($verifyData['verification_code'] == $this->request->getPost('code')) {
                    (new AuthModel)->update(session()->get('account_to_verify'), [
                        'is_verify' => 1
                    ]);
                    session()->setFlashData('success', 'Account verified. You can now login');
                    return redirect()->to('/login');
                } else {
                    session()->setFlashData('verifyError', 'Code is incorrect');
                    return redirect()->to('/verify-account');
                }
            }
        }

        return view('User/verify', $data);
    }

    public function sendVerification($to, $verification_code) {
        $email = \Config\Services::email();

        $email->setFrom('admin@cartmir.com', 'Kasmir');
        $email->setTo($to);
        $email->setSubject('Verification Code');
        $email->setMessage('Code: ' . $verification_code);
        $email->send();
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
                if($admin) {
                    $validatePassword = (new Hash)->decrypt($this->request->getPost('password'), $admin['password']);
                    if (($validatePassword) && ($admin['user_type'] === 'admin')) {
                        $this->setUserSession($admin);
                        return redirect()->to('/dashboard');
                    } else {
                        session()->setFlashData('loginError', 'Email or Password don\'t match');
                        return redirect()->to('/admin');
                    }
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
