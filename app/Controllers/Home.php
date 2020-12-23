<?php

namespace App\Controllers;

use App\Models\Productmodel;
use App\Models\Detailmodel;
use App\Models\Ordermodel;


class Home extends BaseController
{
	protected $productModel;
	protected $detailModel;
	protected $orderModel;
	public function __construct()
	{
		$this->productModel 	= new Productmodel();
		$this->detailModel 		= new Detailmodel();
		$this->orderModel 		= new Ordermodel();
	}
	public function index()
	{
		$data = [
			'products' => $this->productModel->getDetails(),
		];
		return view('client/index', $data);
	}
	public function detail($slug)
	{
		$data = [
			'product' => $this->productModel->getDetails($slug)
		];
		if (empty($data['product'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException("This Product does not exists");
		}

		return view('client/detail', $data);
	}
	public function checkout($slug)
	{
		$data = [
			'validation' => \Config\Services::validation(),
			'product' => $this->productModel->getDetails($slug),

		];
		return view('client/checkout', $data);
	}
	public function payment()
	{
		$slug 		= $this->request->getVar('slug');
		$product 	= $this->request->getVar('product');
		$price 		= $this->request->getVar('price');
		$name 		= $this->request->getVar('name');
		$email 		= $this->request->getVar('email');
		$address 	= $this->request->getVar('address');

		$item = $this->productModel->getDetails($slug);

		// foreach ($item->getResult('array') as $item) {
		// }
		$data = [
			'item' 		=> $item,
			'product' 	=> $product,
			'price'		=> $price,
			'name'		=> $name,
			'email'		=> $email,
			'address'	=> $address,
		];
		// \var_dump($item);
		return view('client/payment', $data);
	}

	public function transaction()
	{
		$id 		= rand();
		$seller 	= $this->request->getVar('seller');
		$name 		= $this->request->getVar('name');
		$email 		= $this->request->getVar('email');
		$address 	= $this->request->getVar('address');
		$price 		= $this->request->getVar('total');

		$dataOrder = [
			'id' 		=> $id,
			'sellerId' 	=> $seller,
			'detailId' 	=> $id,
		];

		$dataDetails = [
			'id' 			=> $id,
			'buyerName' 	=> $name,
			'buyerEmail' 	=> $email,
			'buyerAddress' 	=> $address,
			'totalBuy' 		=> $price,
			'orderId'		=> $id,
			'sellerId' 		=> $seller,
		];

		$this->orderModel->insert($dataOrder);
		$this->detailModel->insert($dataDetails);

		return view('client/success');
	}
	//--------------------------------------------------------------------

}
