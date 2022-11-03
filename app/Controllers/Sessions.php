<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

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
        $user_model = new UserModel();
        $user = $user_model->auth_user($email, $password);
        if($user != NULL){
            $this->session->set('user_id', $user['id']);
            return redirect()->to('/pages');
        } else {
            $this->session->setFlashdata('danger', 'Email dan Password yang Anda masukkan tidak sesuai');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $this->session->remove('user_id');
        return redirect()->to('/');
    }
}
