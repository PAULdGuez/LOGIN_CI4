<?php

namespace App\Controllers\Usuarios;

use App\Controllers\BaseController;

class Dashboard extends BaseController{
    public function index(){
        return view('user/dashboard');
    }
}