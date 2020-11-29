<?php

namespace App\Controllers;

use App\Models\Sellermodel;

class Register extends BaseController
{
    public function index()
    {
        $data = [];
        return view('register', $data);
    }
    public function save()
    {
        $rules = [
            'sellerName' => 'required|min_length[3]|max_length[20]',
            'sellerEmail' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[sellers.sellerEmail]',
            'password' => 'required|min_length[6]|max_length[200]',
            'confirmPassword' => 'matches[password]'
        ];
        if ($this->validate($rules)) {
            $sellerModel = new Sellermodel();
            $data = [
                'sellerName' => $this->request->getVar('sellerName'),
                'sellerAddress' => $this->request->getVar('sellerAddress'),
                'sellerEmail' => $this->request->getVar('sellerEmail'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $sellerModel->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
    }

    //--------------------------------------------------------------------

}
