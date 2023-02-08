<?php

namespace App\Models;

use CodeIgniter\Model;

class WmaModel extends Model
{
    protected $table = 'mwa';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id', 'periode','bulan', 'jumlah'];

}