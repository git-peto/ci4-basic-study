<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\SaleModel;

class SaleItemModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sale_items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['sale_id', 'item_id', 'price', 'quantity', 'subtotal'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_data_by_sale($sale_id){
        $query = $this->where('sale_id', $sale_id);
        $query = $this->join('items', 'items.id = sale_items.item_id');
        $query = $this->select(
            'sale_items.*, items.name AS item_name'
        );
        return $query->get()->getResult();
    }

    public function create_data($params){
        $subtotal = $params->getVar('quantity') * $params->getVar('price');
        $data = [
            'sale_id' => $params->getVar('sale_id'),
            'item_id' => $params->getVar('item_id'),
            'quantity' => $params->getVar('quantity'),
            'price' => $params->getVar('price'),
            'subtotal' => $subtotal
        ];
        if($this->save($data)){
            $sale_model = new SaleModel();
            return $sale_model->update_grand_total($params->getVar('sale_id'));
        } else {
            return false;
        }
    }
}
