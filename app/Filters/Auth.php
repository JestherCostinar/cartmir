<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    // Function to check if is not logged in
    public function before(RequestInterface $request, $arguments = null)
    {
        $location = (session()->get('user_type') === 'user') ? '/login' : '/admin';
        if (!session()->get('isLoggedIn')) {
            return redirect()->to($location);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
