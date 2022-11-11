<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SaleModel;
use App\Models\SaleItemModel;

class Sales extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $sale_model = new SaleModel();
        $data['sales'] = $sale_model->get_all_data();
        $data['main_view'] = 'sales/index';
        return view('layout', $data);
    }

    public function new(){
        $data['main_view'] = 'sales/new';
        return view('layout', $data);
    }

    public function create(){
        $sale_model = new SaleModel();
        $sale_model->create_data($this->request);
        $this->session->setFlashdata('success', 'Sale berhasil disimpan');
        return redirect()->to('/sales' . '/' . $sale_model->getInsertID());
    }

    public function show($id){
        $sale_model = new SaleModel();
        $sale_item_model = new SaleItemModel();
        $data['sale'] = $sale_model->get_data($id);
        $data['sale_items'] = $sale_item_model->get_data_by_sale($id);
        $data['main_view'] = 'sales/show';
        return view('layout', $data);
    }
}
