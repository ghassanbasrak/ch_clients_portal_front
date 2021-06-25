<?php

function admin_tabs()
{
    $session = \Config\Services::session();
    $role = $session->get('role');
    $tabs = [];
    if($role == 'manager')
    {
        return [
            'Users' => site_url('admin/users'),
            'Services' => site_url('admin/services'),
            'Invoices' => site_url('admin/invoices'),
            'Clients' => site_url('admin/clients'),
        ];
    }
    elseif($role == 'financial')
    {
        return [
            'Invoices' => site_url('admin/invoices'),
        ];
    }
    elseif($role == 'editor')
    {
        return [
            'Clients' => site_url('admin/clients'),
        ];
    }
}