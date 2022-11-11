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
        $data['items'] = $item_model->search_data('');
        return $this->setResponseFormat('json')->respond($data, 200);
    }
}
