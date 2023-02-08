<?php

namespace App\Models;

use CodeIgniter\Model;

class ContohModel extends Model
{
    protected $table = 'contoh';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'kode','nilai'];

}