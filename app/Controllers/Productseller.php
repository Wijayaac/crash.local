<?php

namespace App\Controllers;

use App\Models\Productmodel;

class Productseller extends BaseController
{
	protected $productModel;
	public function __construct()
	{
		$this->productModel = new Productmodel();
	}
	public function index()
	{
		$data = [
			'products' => $this->productModel->getProduct()
		];
		return view('seller/view', $data);
	}
	public function detail($id)
	{
		$data = [
			'products' => $this->productModel->getProduct($id)
		];
		if (empty($data['products'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('This product does not exists');
		}
		dd($data);
		// return view('seller/detail', $data);
	}

	public function delete($id)
	{
		$product = $this->productModel->find($id);

		if ($product['image'] != 'default.jpg') {
			unlink(['uploads/' . $product['image']]);
		} else {
			$this->productModel->delete($id);
		}

		$this->productModel->delete($id);

		session()->setFlashdata('message', 'Product has been deleted !');

		return redirect()->to('/seller/view');
	}

	public function create()
	{
		$data = [
			'validation' => \Config\Services::validation(),
			'session' => session(),
		];

		return view('seller/create', $data);
	}

	public function save()
	{

		if (!$this->validate([
			'productName' => [
				'rules' =>  'required|is_unique[Products.productName]',
				'errors' => [
					'required' =>  '*{field} must inserted',
					'is_unique' => '*{field} is already available, please insert another product'
				]
			],
			'image' => [
				'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpeg,image/png,image/jpg]',
				'errors' => [
					'max_size' => '*{field} is to large, maximum 1 mb',
					'is_image' => '*{field} upload product image',
					'mime_in' => '*{field} upload product image'
				]
			]
		])) {
			return redirect()->to('create')->withInput();
		}
		$imageFile = $this->request->getFile('image');

		if ($imageFile->getError() == 4) {
			$imageName = 'default.jpg';
		} else {
			$imageName = $imageFile->getRandomName();
			$imageFile->move('uploads/', $imageName);
		}
		// $data = $this->request->getVar('productName');
		// dd($data);
		$this->productModel->insert(
			[
				'id' => md5(now()),
				'productName' => $this->request->getVar('productName'),
				'price' => $this->request->getVar('price'),
				'description' => $this->request->getVar('description'),
				'statusId' => null,
				'image' => $imageName,
				'sellerId' => session()->get('sessionId'),
			]
		);
		return redirect()->to('/seller/view');
	}

	//--------------------------------------------------------------------

}
