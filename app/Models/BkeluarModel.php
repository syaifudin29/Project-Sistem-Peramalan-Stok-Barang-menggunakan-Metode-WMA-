<?php

namespace App\Models;

use CodeIgniter\Model;

class BkeluarModel extends Model
{
    protected $table = 'brg_klr';
    protected $primaryKey = 'id_brgklr';
     protected $useAutoIncrement = false;
    protected $allowedFields = ['id_brgklr', 'tgl_klr', 'id_barang', 'jml_klr', 'lokasi', 'id_user'];



}