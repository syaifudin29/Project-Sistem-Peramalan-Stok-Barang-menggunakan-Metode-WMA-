<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilanalisisModel extends Model
{
    protected $table = 'hasil_analisis';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'bulan', 'id_barang', 'hasil'];
}