<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }
}
