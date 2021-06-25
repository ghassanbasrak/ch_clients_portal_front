<?php

namespace App\Controllers;

class Authentication extends BaseController
{
    protected $helpers = ["form", "url"];
    protected $request;


    public function login()
    {

       if($this->request->getMethod() == 'post')
        {

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            helper('authentication_helper');
            login($email, $password);
        }
        $session = \Config\Services::session();
        if($session->get('user_id'))
            return redirect('admin/dashboard');
        return view('authentication/login');
    }
    public function client_login()
    {
        if($this->request->getMethod() == 'post')
        {

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            helper('authentication_helper');
            client_login($email, $password);
        }
        $session = \Config\Services::session();
        if($session->get('client_id'))
            return redirect('client/dashboard');
        return view('authentication/login');
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->back();

    }
}
