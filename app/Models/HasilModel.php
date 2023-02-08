<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table = 'hasil';
    protected $primaryKey = 'id';
    // protected $useAutoIncrement = false;
    protected $allowedFields = ['id','bulan', 'wma3','wma4','wma5','wma6','error3', 'error4', 'error5', 'error6'];

}