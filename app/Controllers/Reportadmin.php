<?php

namespace App\Controllers;

use \App\Models\Ordermodel;

class Reportadmin extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new Ordermodel();
    }
    public function index()
    {

        $data = [
            'order' => $this->orderModel->getOrder()
        ];
        return view('admin/order', $data);
    }

    //--------------------------------------------------------------------

}
