<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        helper('api');
    }

    public function index()
    {
        $data['users'] = get_users();
        $data['title'] = 'Users';
        return view('admin/users/manage', $data);
    }

    public function create()
    {
        if($this->request->getMethod() == 'post')
        {
            $data = [
                'email' => $this->request->getVar('email'),
                'full_name' => $this->request->getVar('full_name'),
                'phone_number' => $this->request->getVar('phone_number'),
                'address' => $this->request->getVar('address'),
                'role' => $this->request->getVar('role'),
                'password' => $this->request->getVar('password'),
            ];
            $session = \Config\Services::session();
            if(create_user($data))
            {
                $session->setFlashdata('success', 'User Added Successfully');
            }
            else{
                $session->setFlashdata('danger', 'Something went Wrong!');
            }
            return redirect('admin/users');
        }
    }


    public function get_user($id)
    {
        echo json_encode(get_user($id));
    }

    public function update()
    {
        if($this->request->getMethod() == 'post')
        {
            $id = $this->request->getVar('id');
            $data = [
                'email' => $this->request->getVar('email'),
                'full_name' => $this->request->getVar('full_name'),
                'phone_number' => $this->request->getVar('phone_number'),
                'address' => $this->request->getVar('address'),
                'role' => $this->request->getVar('role'),
                'password' => $this->request->getVar('password'),
            ];
            $session = \Config\Services::session();
            if(update_user($id, $data))
            {
                $session->setFlashdata('success', 'User Updated Successfully');
            }
            else{
                $session->setFlashdata('danger', 'Something went Wrong!');
            }
            return redirect('admin/users');
        }
    }
}
