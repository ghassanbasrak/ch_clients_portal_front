<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if($request->getUri()->getPath() == "/admin/authentication/login")
            return true;
        $session = \Config\Services::session();
        if($session->get('user_id'))
            return true;
        return redirect('admin/authentication/login');

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}