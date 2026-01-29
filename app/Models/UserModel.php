<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; // O true si prefieres soft deletes

    protected $allowedFields = ['email', 'password', 'role'];

    // Timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules    = [
        'email'    => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'permit_empty|min_length[6]', // Permit empty en update
        'role'     => 'required|in_list[admin,user]',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // Callbacks
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }
        
        // Si viene vacío (en update), lo eliminamos para no sobreescribir con vacío
        if (empty($data['data']['password'])) {
            unset($data['data']['password']);
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}