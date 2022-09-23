<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Employees extends BaseController
{
    public function index()
    {
        $data['main_view'] = 'employees/index';
        return view('layout', $data);
    }

    public function add(){
        $data['main_view'] = 'employees/add';
        return view('layout', $data);
    }
}
