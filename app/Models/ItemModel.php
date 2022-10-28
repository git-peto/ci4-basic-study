<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'unit', 'price', 'image_name', 'status_id'];

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

    public function get_all_data(){
        return $this->get()->getResult();
    }

    public function get_data($id){
        return $this->find($id);
    }

    public function search_data($search) {
        $query = $this->like('LOWER(name)', strtolower($search));
        $query = $query->orLike('LOWER(price)', strtolower($search));
        $query = $query->orLike('LOWER(unit)', strtolower($search));
        $query = $query->orderBy('name', 'ASC');
        return $query->paginate(5, 'items');
    }

    public function create_data($params){
        $uploaded_file = $params->getFile('image_upload');
        $image_name = $uploaded_file->getRandomName();
        $uploaded_file->move('assets/images', $image_name);

        $data = [
            'name' => $params->getVar('name'),
            'unit' => $params->getVar('unit'),
            'price' => $params->getVar('price'),
            'image_name' => $image_name,
            'status_id' => $params->getVar('status_id')
        ];
        return $this->save($data);
    }

    public function update_data($id, $params){
        $data = [
            'name' => $params->getVar('name'),
            'unit' => $params->getVar('unit'),
            'price' => $params->getVar('price'),
            'status_id' => $params->getVar('status_id')
        ];
        return $this->update($id, $data);
    }
}
