<?php

namespace App\Models;

use CodeIgniter\Model;

class Sellermodel extends Model
{
    protected $table = 'sellers';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['sellerName', 'sellerAddress', 'sellerEmail', 'password', 'created_at', 'updated_at'];
}
