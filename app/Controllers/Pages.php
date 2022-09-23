<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index() {
        $data['main_view'] = 'pages/index';
        return view('layout', $data);
    }

    public function dashboard(){
        $data['main_view'] = 'pages/dashboard';
        return view('layout', $data);
    }

    public function login(){
        return view('login');
    }

    public function checklogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email == 'test@email.com' && $password == '123'){
            return redirect()->to('/pages'); 
        } else {
            echo "Email dan Password yang Anda masukkan tidak sesuai";
        }
    }
}


