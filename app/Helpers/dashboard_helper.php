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
            'Services' => site_url('admin/Services'),
            'Invoices' => site_url('admin/Invoices'),
            'Clients' => site_url('admin/Clients'),
        ];
    }
    elseif($role == 'financial')
    {
        return [
            'Invoices' => site_url('admin/Invoices'),
        ];
    }
    elseif($role == 'editor')
    {
        return [
            'Clients' => site_url('admin/Clients'),
        ];
    }
}