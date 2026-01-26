<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthUser implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Verificar si hay sesión
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login');
        }

        // 2. Verificar si el rol es 'usuario'
        if (session()->get('role') != 'usuario') {
            // Si es admin intentando entrar aquí, quizás quieras dejarlo pasar 
            // o redirigirlo a su propio panel. Por seguridad estricta, lo sacamos:
            return redirect()->to('/admin/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nada aquí
    }
}