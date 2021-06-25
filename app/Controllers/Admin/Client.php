<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Client extends BaseController
{
    public function __construct()
    {
        helper('api');
    }

    public function index()
    {
        $data['clients'] = get_clients();
        $data['title'] = 'Clients';
        return view('admin/clients/manage', $data);
    }

    public function create()
    {
        if($this->request->getMethod() == 'post')
        {
            $data = [
                'full_name' => $this->request->getVar('full_name'),
                'email' => $this->request->getVar('email'),
                'address' => $this->request->getVar('address'),
                'company_name' => $this->request->getVar('company_name'),
                'phone_number' => $this->request->getVar('phone_number'),
                'server_name' => $this->request->getVar('server_name'),
                'database_name' => $this->request->getVar('database_name'),
                'database_username' => $this->request->getVar('database_username'),
                'database_password' => $this->request->getVar('database_password'),
                'password' => $this->request->getVar('password'),
            ];
            $session = \Config\Services::session();
            if(create_client($data))
            {
                $session->setFlashdata('success', 'Client Added Successfully');
            }
            else{
                $session->setFlashdata('danger', 'Something went Wrong!');
            }
            return redirect('admin/clients');
        }
    }

    public function get_client($id)
    {
        echo json_encode(get_client($id));
    }

    public function show($id)
    {
        $group = $this->request->getVar('group');
        if($group == 'invoices'){
            $data['invoices'] = get_client_invoices($id);
        }
        $data['client'] = get_client($id);
        $data['group'] = $group;
        $data['title'] = $data['client']->full_name;
        return view('admin/clients/client', $data);
    }

    public function update()
    {
        if($this->request->getMethod() == 'post')
        {
            $id = $this->request->getVar('id');
            $data = [
                'full_name' => $this->request->getVar('full_name'),
                'email' => $this->request->getVar('email'),
                'address' => $this->request->getVar('address'),
                'company_name' => $this->request->getVar('company_name'),
                'phone_number' => $this->request->getVar('phone_number'),
                'password' => $this->request->getVar('password'),
            ];
            $session = \Config\Services::session();
            if(update_client($id, $data))
            {
                $session->setFlashdata('success', 'Client Updated Successfully');
            }
            else{
                $session->setFlashdata('danger', 'Something went Wrong!');
            }
            return redirect()->back();
        }
    }

    public function update_database()
    {
        if($this->request->getMethod() == 'post')
        {
            $id = $this->request->getVar('id');
            $data = [
                'server_name' => $this->request->getVar('server_name'),
                'database_name' => $this->request->getVar('database_name'),
                'database_username' => $this->request->getVar('database_username'),
                'database_password' => $this->request->getVar('database_password'),
            ];

            $session = \Config\Services::session();
            if(update_database($id, $data))
            {
                $session->setFlashdata('success', 'Client Database Updated Successfully');
            }
            else{
                $session->setFlashdata('danger', 'Something went Wrong!');
            }
            return redirect()->back();
        }
    }
}
