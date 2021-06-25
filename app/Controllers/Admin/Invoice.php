<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Invoice extends BaseController
{
    public function __construct()
    {
        helper('api');
    }

    public function index()
    {

        $data['invoices'] = get_invoices();
        $data['clients'] = get_clients();
        $data['services'] = get_services();
        $data['title'] = 'Invoices';
        return view('admin/invoices/manage', $data);
    }


    public function pdf($id)
    {
        $data['invoice'] = get_invoice($id);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('admin/invoices/pdf', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function show($id)
    {
        $data['invoice'] = get_invoice($id);
        return view('admin/invoices/pdf', $data);
    }

    public function create()
    {
        if($this->request->getMethod() == 'post')
        {
            $data = [
                'client_id' => $this->request->getVar('client'),
                'type' => $this->request->getVar('type'),
                'sub_total' => $this->request->getVar('sub_total'),
                'discount' => $this->request->getVar('discount'),
                'total' => $this->request->getVar('total'),
                'items' => []
            ];
            foreach ($this->request->getVar('service') as $item)
            {
                if(isset($item['id'])){
                    $data['items'][] = $item;
                }
            }
            $session = \Config\Services::session();
            if(create_invoice($data))
            {
                $session->setFlashdata('success', 'Invoice Added Successfully');
            }
            else{
                $session->setFlashdata('danger', 'Something went Wrong!');
            }
            return redirect('admin/invoices');
        }
    }
}
