<?php

namespace App\Controllers;

use \App\Models\Ordermodel;

class Reportseller extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new Ordermodel();
    }
    public function index()
    {
        $id = session()->get('sessionId');

        $data = [
            'order' => $this->orderModel->getOrder($id)
        ];
        return view('seller/order', $data);
    }

    //--------------------------------------------------------------------

}
