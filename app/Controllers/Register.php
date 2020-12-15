<?php

namespace App\Controllers;

use App\Models\Sellermodel;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }
    public function save()
    {
        $rules = [
            'sellerName'    => 'required|min_length[3]|max_length[20]',
            'sellerEmail'   => 'required|min_length[6]|max_length[50]|valid_email|is_unique[sellers.sellerEmail]',
            'password'      => 'required|min_length[6]|max_length[200]'
        ];
        if ($this->validate($rules)) {
            $sellerModel = new Sellermodel();

            $id         = md5(now());
            $seller     = $this->request->getVar('sellerName');
            $address    = $this->request->getVar('sellerAddress');
            $email      = $this->request->getVar('sellerEmail');
            $password   = md5($this->request->getVar('password'));

            $data = [
                'id'            => $id,
                'sellerName'    => $seller,
                'sellerAddress' => $address,
                'sellerEmail'   => $email,
                'password'      => $password
            ];
            $sellerModel->insert($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
    }

    //--------------------------------------------------------------------

}
