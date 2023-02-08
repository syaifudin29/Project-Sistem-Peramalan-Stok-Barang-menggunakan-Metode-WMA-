<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_barang', 'nm_barang','stok', 'harga', 'id_jenis', 'id_gudang', 'id_satuan', 'is_delete'];

}