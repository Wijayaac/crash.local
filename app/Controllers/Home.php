<?php

namespace App\Controllers;

use App\Models\Productmodel;

class Home extends BaseController
{
	protected $productModel;
	public function __construct()
	{
		$this->productModel = new Productmodel();
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
			'product' => $this->productModel->getProduct($slug)
		];
		return view('client/checkout', $data);
	}



	//--------------------------------------------------------------------

}
