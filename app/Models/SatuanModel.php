<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table = 'satuan';
    protected $primaryKey = 'id_satuan';
    protected $allowedFields = ['id_satuan', 'nm_satuan', 'is_delete'];



}