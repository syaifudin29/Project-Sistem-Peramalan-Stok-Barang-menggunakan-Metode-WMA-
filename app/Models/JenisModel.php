<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['id_jenis', 'nm_jenis', 'is_delete'];



}