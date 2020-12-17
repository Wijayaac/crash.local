<?php

namespace App\Models;

use CodeIgniter\Model;

class Detailmodel extends Model
{
    protected $table = 'OrderDetails';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'buyerName', 'buyerEmail', 'buyerAddress', 'totalBuy', 'orderId', 'sellerId'];
}
