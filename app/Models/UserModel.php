<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password', 'status_id'];

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
        $query = $query->orLike('LOWER(email)', strtolower($search));
        $query = $query->orderBy('name', 'ASC');
        return $query->paginate(5, 'users');
    }

    public function create_data($params){
        $data = [
            'name' => $params->getVar('name'),
            'email' => $params->getVar('email'),
            'password' => password_hash($params->getVar('password'), PASSWORD_DEFAULT),
            'status_id' => $params->getVar('status_id')
        ];
        return $this->save($data);
    }

    public function update_data($id, $params){
        $data = [
            'name' => $params->getVar('name'),
            'email' => $params->getVar('email'),
            'password' => password_hash($params->getVar('password'), PASSWORD_DEFAULT),
            'status_id' => $params->getVar('status_id')
        ];
        return $this->update($id, $data);
    }

    public function auth_user($email, $password){
        $query = $this->where('LOWER(email)', strtolower(trim($email)));
        $result = $query->get()->getRowArray();
        $match = false;
        if($result === NULL){
            $match = false;
        } else if(password_verify($password, $result['password'])){
            $match = true;
        } else {
            $match = false;
        }
        return $match;
    }
}
