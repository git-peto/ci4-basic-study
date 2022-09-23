<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Sessions extends BaseController
{
    protected $request, $session;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if ($this->session->get('user_id')) {
            return redirect()->to('/pages');
        }

        return view('sessions/index');
    }

    public function create()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        if ($email == 'test@email.com' && $password == '123') {
            $this->session->set('user_id', 1);
            return redirect()->to('/pages');
        } else {
            $this->session->setFlashdata('danger', 'Email dan Password yang Anda masukkan tidak sesuai');
            return redirect()->to('/pages');
        }
    }

    public function logout()
    {
        $this->session->remove('user_id');
        return redirect()->to('/');
    }
}
