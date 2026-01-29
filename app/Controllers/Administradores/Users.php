<?php

namespace App\Controllers\Administradores;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        // Pasamos mensajes flash si existen
        $data['msg'] = session()->getFlashdata('msg');
        $data['error'] = session()->getFlashdata('error');
        
        return view('admin/users/index', $data);
    }

    public function new()
    {
        return view('admin/users/form', ['validation' => \Config\Services::validation()]);
    }

    public function create()
    {
        // Regla especial para create: Password requerido
        $rules = [
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required|in_list[admin,user]'
        ];

        if (! $this->validate($rules)) {
            return view('admin/users/form', [
                'validation' => $this->validator
            ]);
        }

        $this->userModel->save([
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => $this->request->getPost('role'),
        ]);

        return redirect()->to('/admin/users')->with('msg', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (! $user) {
            return redirect()->to('/admin/users')->with('error', 'Usuario no encontrado.');
        }

        return view('admin/users/form', [
            'user' => $user,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function update($id)
    {
        // Validamos usando las reglas del modelo, pero password es opcional
        // (Ya configurado en las $validationRules del modelo, pero hay que pasar el ID para el is_unique)

        $data = [
            'id'    => $id,
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role'),
        ];

        // Solo añadimos password si se escribió algo
        $password = $this->request->getPost('password');
        if (! empty($password)) {
            $data['password'] = $password;
        }

        if (! $this->userModel->save($data)) {
            return view('admin/users/form', [
                'user' => $this->userModel->find($id),
                'validation' => $this->userModel->errors() 
            ]);
        }

        return redirect()->to('/admin/users')->with('msg', 'Usuario actualizado correctamente.');
    }

    public function delete($id)
    {
        if($this->userModel->delete($id)){
            return redirect()->to('/admin/users')->with('msg', 'Usuario eliminado.');
        } else {
            return redirect()->to('/admin/users')->with('error', 'No se pudo eliminar el usuario.');
        }
    }
}
