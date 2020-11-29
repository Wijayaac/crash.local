<?php

namespace App\Controllers;

use App\Models\Sellermodel;
use App\Models\Adminmodel;


class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function authSeller()
    {
        $session = session();
        $sellerModel = new Sellermodel();
        $sellerEmail = $this->request->getVar('sellerEmail');
        $password = $this->request->getVar('password');
        $data = $sellerModel->where('sellerEmail', $sellerEmail)->first();
        if ($data) {
            $realPassword = $data['password'];
            $verifyPassword = password_verify($password, $realPassword);
            if ($verifyPassword) {
                $sessionData = [
                    'sessionId' => $data['id'],
                    'sessionName' => $data['sellerName'],
                    'sessionEmail' => $data['sellerEmail'],
                    'sessionLogin' => TRUE
                ];
                $session->set($sessionData);
                return redirect()->to('/seller/view');
            } else {
                $session->setFlashdata('message', 'Incorrect password. Try Again');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('message', 'Incorrect email. Try Again');
            return redirect()->to('/login');
        }
    }
    public function authAdmin()
    {
        $session = session();
        $adminModel = new Adminmodel();
        $adminEmail = $this->request->getVar('adminEmail');
        $password = $this->request->getVar('password');
        $data = $adminModel->where('adminEmail', $adminEmail)->first();
        if ($data) {
            $realPassword = $data['password'];
            $verifyPassword = password_verify($password, $realPassword);
            if ($verifyPassword) {
                $sessionData = [
                    'sessionId' => $data['id'],
                    'sessionUser' => $data['username'],
                    'sessionName' => $data['sellerName'],
                    'sessionEmail' => $data['sellerEmail'],
                    'sessionLogin' => TRUE
                ];
                $session->set($sessionData);
                return redirect()->to('/admin/view');
            } else {
                $session->setFlashdata('message', 'Incorrect password. Try Again');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('message', 'Incorrect email. Try Again');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }


    //--------------------------------------------------------------------

}
