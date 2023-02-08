<?php

namespace App\Models;

use CodeIgniter\Model;

class SuplierModel extends Model
{
    protected $table = 'suplier';
    protected $primaryKey = 'id_suplier';
    protected $allowedFields = ['id_suplier', 'suplier', 'nama', 'no_telp', 'alamat', 'is_delete'];



}