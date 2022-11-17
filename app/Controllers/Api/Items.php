<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use CodeIgniter\API\ResponseTrait;

class Items extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $item_model = new ItemModel();
        $search = $this->request->getVar('search') ?? '';
        $data['items'] = $item_model->search_data($search);
        $data['message'] = 'Barang berhasil diload';
        return $this->setResponseFormat('json')->respond($data, 200);
    }

    public function show($id){
        $item_model = new ItemModel();
        $data['item'] = $item_model->get_data($id);
        $data['message'] = 'Barang berhasil diload';
        return $this->setResponseFormat('json')->respond($data, 200);
    }

    public function create(){
        $item_model = new ItemModel();
        if($item_model->create_data($this->request)){
            $data['message'] = 'Barang berhasil disimpan';
            return $this->setResponseFormat('json')->respond($data, 200);
        } else {
            $data['message'] = 'Barang gagal disimpan';
            return $this->setResponseFormat('json')->respond($data, 500);
        }
    }
}
