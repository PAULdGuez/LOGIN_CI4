<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Verificar si hay sesión iniciada
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login'); 
        }

        // 2. Verificar si el rol es 'admin'
        if (session()->get('role') != 'admin') {
            // Si está logueado pero NO es admin, lo mandamos a su dashboard correspondiente
            // o a una página de error 403.
            return redirect()->to('/user/dashboard'); 
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No necesitamos hacer nada después
    }
}