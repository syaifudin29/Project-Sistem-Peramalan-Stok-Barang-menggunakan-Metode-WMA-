<?php

namespace App\Models;

use CodeIgniter\Model;

class AktualModel extends Model
{
    protected $table = 'aktual';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'id_barang','bulan', 'nilai'];

}