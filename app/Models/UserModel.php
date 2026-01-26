<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // Nombre de tu tabla en MySQL
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    // ¡Importante! Aquí defines qué campos se pueden guardar
    protected $allowedFields = ['email', 'password', 'role'];

    // Para que CI4 maneje las fechas de creación automáticamente
    protected $useTimestamps = false; 
}