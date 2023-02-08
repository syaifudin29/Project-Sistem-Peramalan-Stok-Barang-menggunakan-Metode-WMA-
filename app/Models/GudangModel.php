<?php

namespace App\Models;

use CodeIgniter\Model;

class GudangModel extends Model
{
    protected $table = 'gudang';
    protected $primaryKey = 'id_gudang';
    protected $allowedFields = ['id_barang', 'nm_gudang'];



}