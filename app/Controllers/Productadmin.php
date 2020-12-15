<?php

namespace App\Controllers;

use App\Models\Productmodel;

class Productadmin extends BaseController
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
        return view('admin/view', $data);
    }
    public function detail($slug)
    {
        $data = [
            'products' => $this->productModel->getProduct($slug),
            'details' => $this->productModel->getDetails($slug)
        ];
        if (empty($data['products'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('This product does not exists');
        }

        return view('admin/detail', $data);
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);

        if ($product['image'] != 'default.jpg') {
            foreach ($product as $file) {
                if (file_exists($file)) {
                    unlink(base_url() . 'public/uploads' . $file['image']);
                }
            }
        } else {
            $this->productModel->delete($id);
        }

        $this->productModel->delete($id);

        session()->setFlashdata('message', 'Product has been deleted !');

        return redirect()->to('/admin/view');
    }
    public function approve($id)
    {
        $this->productModel->update(
            $id,
            [
                'statusId' => 1
            ]
        );
        session()->setFlashdata('message', '1 Product has been approve');

        return redirect()->to('/admin/view');
    }

    //--------------------------------------------------------------------

}
