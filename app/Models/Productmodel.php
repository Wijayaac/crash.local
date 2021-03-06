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

    public function getDetails($slug = false)
    {
        if ($slug ==  false) {
            return $this->query("SELECT * FROM StatusProduct JOIN sellers JOIN Products ON StatusProduct.id = Products.statusId WHERE Products.statusId = 1");
        }
        return $this->query("SELECT * FROM StatusProduct JOIN sellers JOIN Products ON StatusProduct.id = Products.statusId WHERE Products.slug = '" . $slug . "'LIMIT 1;");
    }

    public function getSellerProduct($id = '')
    {
        if ($id == '') {
            return $this->findAll();
        }
        return $this->where(['sellerId' => $id]);
    }
}
