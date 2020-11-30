<?php

namespace App\Models;

use CodeIgniter\Model;

class Productmodel extends Model
{
    protected $table = 'Products';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'productName', 'slug', 'price', 'description', 'image', 'statusId',  'sellerId'];

    public function getProduct($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
