<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;

class Items extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $item_model = new ItemModel();
        $data['main_view'] = 'items/index';
        $data['items'] = $item_model->get_all_data();
        return view('layout', $data);
    }

    public function new()
    {
        $data['main_view'] = 'items/new';
        return view('layout', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'name' => "required|alpha_numeric_space",
            'unit'  => 'required|alpha_numeric_space',
            'price'  => 'required|integer',
            'image_upload' => 'uploaded[image_upload]'
        ])) {
            $data['main_view'] = 'items/new';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }

        $item_model = new ItemModel();
        $item_model->create_data($this->request);
        $this->session->setFlashdata('success', 'Barang berhasil disimpan');
        return redirect()->to('/items');
    }

    public function delete($id){
        $id = $this->request->getVar('id');
        $item_model = new ItemModel();
        $item_model->delete($id);
        $this->session->setFlashdata('success', 'Barang berhasil dihapus');
        return redirect()->to('/items');
    }

    public function edit($id){
        $item_model = new ItemModel();
        $data['main_view'] = 'items/edit';
        $data['item'] = $item_model->get_data($id);
        return view('layout', $data);
    }

    public function update($id){
        if (!$this->validate([
            'name' => "required|alpha_numeric_space",
            'unit'  => 'required|alpha_numeric_space',
            'price'  => 'required|integer',
        ])) {
            $data['main_view'] = 'items/edit';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }

        $item_model = new ItemModel();
        $item_model->update_data($id, $this->request);
        $this->session->setFlashdata('success', 'Barang berhasil diperbarui');
        return redirect()->to('/items');
    }
}
