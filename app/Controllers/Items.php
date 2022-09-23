<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Items extends BaseController
{
    public function index() {
        $data['main_view'] = 'items/index';
        return view('layout', $data);
    }
}


