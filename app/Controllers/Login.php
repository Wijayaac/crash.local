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
    public function sellerAuth()
    {
        $session = session();
        $sellerModel = new Sellermodel();
        $sellerEmail = $this->request->getVar('sellerEmail');
        $password = $this->request->getVar('password');
        $data = $sellerModel->where('sellerEmail', $sellerEmail)->first();
        if ($data) {
            $realPassword = $data['password'];
            if ($realPassword == md5($password)) {
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
    public function admin()
    {
        return view('admin/login');
    }
    public function adminAuth()
    {
        $session = session();
        $adminModel = new Adminmodel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $adminModel->where('username', $username)->first();
        if ($data) {
            $realPassword = $data['password'];
            if ($realPassword == md5($password)) {
                $sessionData = [
                    'sessionId' => $data['id'],
                    'sessionUser' => $data['username'],
                    'sessionName' => $data['adminName'],
                    'sessionEmail' => $data['adminEmail'],
                    'sessionLogin' => TRUE
                ];
                $session->set($sessionData);
                return redirect()->to('/admin/view');
            } else {
                $session->setFlashdata('message', 'Incorrect password. Try Again');
                return redirect()->to('/login/admin');
            }
        } else {
            $session->setFlashdata('message', 'Incorrect email. Try Again');
            return redirect()->to('/login/admin');
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
