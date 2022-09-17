<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuth implements FilterInterface
{
    // Function to check if is logged in then return true
    public function before(RequestInterface $request, $arguments = null)
    {
        $location = (session()->get('user_type') === 'user') ? '/dashboard' : '/';
        if (session()->get('isLoggedIn')) {
            return redirect()->to($location);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
