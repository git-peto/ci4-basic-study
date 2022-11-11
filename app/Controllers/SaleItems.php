<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SaleItemModel;

class SaleItems extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function create()
    {
        $sale_item_model = new SaleItemModel();
        $sale_item_model->create_data($this->request);
        $this->session->setFlashdata('success', 'Sale item berhasil disimpan');
        return redirect()->to("/sales" . "/" . $this->request->getVar('sale_id'));
    }
}
