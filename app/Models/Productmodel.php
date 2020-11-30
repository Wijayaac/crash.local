<?php

namespace App\Models;

use CodeIgniter\Model;

class Productmodel extends Model
{
    protected $table = 'Products';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'productName', 'price', 'description', 'image', 'statusId',  'sellerId'];

    public function getProduct($id = 0)
    {
        if ($id == 0) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
