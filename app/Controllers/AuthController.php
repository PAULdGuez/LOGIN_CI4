<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    // 1. Mostrar el formulario de login
    public function login()
    {
        // Si ya está logueado, redirigir al dashboard correspondiente
        if (session()->get('is_logged_in')) {
            $ruta = (session()->get('role') == 'admin') ? '/admin/dashboard' : '/user/dashboard';
            return redirect()->to($ruta);
        }
        
        // Asegúrate de tener creada la vista en app/Views/auth/login.php
        return view('auth/login');
    }

    // 2. Procesar los datos del login (POST)
    public function check()
    {
        $session = session();
        $model = new UserModel();

        // Recibimos datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Buscamos el usuario por email
        $data = $model->where('email', $email)->first();

        if ($data) {
            // Verificamos la contraseña
            $passEncoded = $data['password'];
            
            $isAuthenticated = false;

            // 1. Intento con password_verify (Hashing seguro)
            if (password_verify($password, $passEncoded)) {
                $isAuthenticated = true;
            } 
            // 2. Fallback: Comparación texto plano (Legacy - Solo si la primera falla)
            elseif ($password == $passEncoded) {
                $isAuthenticated = true;
                // Auto-upgrade: Hashear contraseña para la próxima vez
                // Desactivamos temporalmente timestamps para no cambiar updated_at si no queremos, o mejor dejamos que actualice.
                $model->save([
                   'id' => $data['id'],
                   'password' => $password // El modelo se encarga de hashear con beforeUpdate
                ]);
            }

            if ($isAuthenticated) {
                
                // Datos para la sesión
                $ses_data = [
                    'id'       => $data['id'],
                    'email'    => $data['email'],
                    'role'     => $data['role'],
                    'is_logged_in' => TRUE
                ];
                $session->set($ses_data);

                // Redirección según rol
                if ($data['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/user/dashboard');
                }

            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email no encontrado');
            return redirect()->to('/login');
        }
    }

    // 3. Cerrar sesión
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}