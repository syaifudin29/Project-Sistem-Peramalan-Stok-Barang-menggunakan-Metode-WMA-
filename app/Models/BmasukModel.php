<?php

namespace App\Models;

use CodeIgniter\Model;

class BmasukModel extends Model
{
    protected $table = 'brg_msk';
    protected $primaryKey = 'id_brgmsk';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_brgmsk', 'tgl_msk', 'id_suplier', 'id_barang', 'jml_msk', 'id_user'];
}