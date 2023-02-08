<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'nama', 'email', 'no_telp', 'username', 'password', 'gambar', 'role', 'is_delete'];



}