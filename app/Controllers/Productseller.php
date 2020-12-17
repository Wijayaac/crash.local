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
		$data 	= [
			'id'		=> session()->get('sessionId'),
			'products'	=> $this->productModel->getProduct()
		];
		return view('seller/view', $data);
	}
	public function detail($slug)
	{
		$data = [
			'products' 	=> $this->productModel->getProduct($slug),
			'details' 	=> $this->productModel->getDetails($slug)
		];
		if (empty($data['products'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('This product does not exists');
		}
		// dd($data);
		return view('seller/detail', $data);
	}

	public function delete($id)
	{
		$product = $this->productModel->find($id);

		if ($product['image'] != 'default.jpg') {
			foreach ($product as $file) {
				if (file_exists($file)) {
					unlink('uploads/' . $file['image']);
				}
			}
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
			'validation' 	=> \Config\Services::validation(),
			'session' 		=> session(),
		];

		return view('seller/create', $data);
	}

	public function save()
	{

		if (!$this->validate([
			'productName' => [
				'rules' 	=>  'required|is_unique[Products.productName]',
				'errors' 	=> [
					'required' 	=>  '*{field} must inserted',
					'is_unique' => '*{field} is already available, please insert another product'
				]
			],
			'image' => [
				'rules' 	=> 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpeg,image/png,image/jpg]',
				'errors' 	=> [
					'max_size' 	=> '*{field} is to large, maximum 1 mb',
					'is_image' 	=> '*Please just upload proper image png/jpg',
					'mime_in' 	=> '*Please just upload proper image png/jpg'
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

		$slug 			= url_title($this->request->getVar('productName'), '-', true);
		$id				= md5(now());
		$name			= $this->request->getVar('productName');
		$price			= $this->request->getVar('price');
		$description	= $this->request->getVar('description');
		$status			= 0;
		$seller			= session()->get('sessionId');

		$this->productModel->insert(
			[
				'id' 			=> $id,
				'productName' 	=> $name,
				'slug' 			=> $slug,
				'price' 		=> $price,
				'description' 	=> $description,
				'statusId' 		=> $status,
				'image' 		=> $imageName,
				'sellerId' 		=> $seller
			]
		);
		session()->setFlashdata('message', 'Your Product has been added');
		return redirect()->to('/seller/view');
	}
	public function edit($slug)
	{
		$data = [
			'validation' => \Config\Services::validation(),
			'products' => $this->productModel->getProduct($slug)
		];
		return view('/seller/edit', $data);
	}
	public function update($id)
	{
		$oldProduct = $this->productModel->getProduct($this->request->getVar('slug'));
		$newProduct = $this->request->getVar('productName');

		if ($oldProduct['productName'] == $newProduct) {
			$ruleName = 'required';
		} else {
			$ruleName = 'required|is_unique[Products.productName]';
		}

		if (!$this->validate([
			'productName' => [
				'rules' 	=> $ruleName,
				'errors' 	=> [
					'is_unique' => '*{field} already available please sell other product ',
					'required' 	=> '*{field} must inserted ',
				]
			],
			'image' => [
				'rules' 	=> 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
				'errors' 	=> [
					'max_size' 	=> 'Product image is to large, max 1mb',
					'is_image' 	=> 'Please just upload proper image png/jpg',
					'mime_in' 	=> 'Please just upload proper image png/jpg'
				]
			]
		])) {
			return redirect()->to('/seller/edit/' . $this->request->getVar('slug'))->withInput();
		}

		$imageFile = $this->request->getFile('image');

		if ($imageFile->getError() == 4) {
			$imageName = $this->request->getVar('oldImage');
		} elseif ($this->request->getVar('oldImage') != 'default.jpg') {
			unlink('uploads/' . $this->request->getVar('oldImage'));

			$imageName = $imageFile->getRandomName();
			$imageFile->move('uploads/', $imageName);
		} else {
			$imageName = $imageFile->getRandomName();
			$imageFile->move('uploads/', $imageName);
		}

		$slug 			= url_title($this->request->getVar('productName'), '-', true);
		$name			= $this->request->getVar('productName');
		$price			= $this->request->getVar('price');
		$description	= $this->request->getVar('description');
		$status			= 0;


		$this->productModel->update($id, [

			'productName' 	=> $name,
			'slug' 			=> $slug,
			'price' 		=> $price,
			'description' 	=> $description,
			'statusId' 		=> $status,
			'image' 		=> $imageName,

		]);
		session()->setFlashdata('message', 'Your Product has been updated');

		return redirect()->to('/seller/view');
	}

	//--------------------------------------------------------------------

}
