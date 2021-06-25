<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Service extends BaseController
{
    public function __construct()
    {
        helper('api');
    }

    public function index()
    {
        $data['services'] = get_services();
        $data['title'] = 'Services';
        return view('admin/services/manage', $data);
    }

    public function get_service($id)
    {
        echo json_encode(get_service($id));
    }

    public function create()
    {
        if($this->request->getMethod() == 'post')
        {
            $data = [
                'name' => $this->request->getVar('name'),
                'price' => $this->request->getVar('price'),
                'description' => $this->request->getVar('description')
            ];
            $session = \Config\Services::session();
            if(create_service($data))
            {
                $session->setFlashdata('success', 'Service Added Successfully');
            }
            else{
                $session->setFlashdata('danger', 'Something went Wrong!');
            }
            return redirect('admin/services');
        }
    }



    public function update()
    {
        if($this->request->getMethod() == 'post')
        {
            $id = $this->request->getVar('id');
            $data = [
                'name' => $this->request->getVar('name'),
                'price' => $this->request->getVar('price'),
                'description' => $this->request->getVar('description')
            ];
            $session = \Config\Services::session();
            if(update_service($id, $data))
            {
                $session->setFlashdata('success', 'Service Updated Successfully');
            }
            else{
                $session->setFlashdata('danger', 'Something went Wrong!');
            }
            return redirect('admin/services');
        }
    }
}
