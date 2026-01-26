<?php

namespace App\Controllers\Administradores;

use App\Controllers\BaseController;

class Dashboard extends BaseController{
    public function index(){
        return view('admin/dashboard');
    }
}