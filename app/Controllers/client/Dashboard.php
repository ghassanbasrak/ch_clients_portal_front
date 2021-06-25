<?php

namespace App\Controllers\client;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
