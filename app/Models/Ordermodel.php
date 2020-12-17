<?php

namespace App\Models;

use CodeIgniter\Model;

class Ordermodel extends Model
{
    protected $table = 'Orders';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'sellerId', 'detailId'];

    public function getOrder($id = '')
    {
        if ($id == '') {
            return $this->query("SELECT * FROM OrderDetails LEFT JOIN sellers ON sellers.id = OrderDetails.sellerId");
        }
        return $this->query("SELECT * FROM OrderDetails LEFT JOIN sellers ON sellers.id = OrderDetails.sellerId WHERE sellerId = '" . $id . "';");
    }
}
