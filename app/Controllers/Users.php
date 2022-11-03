<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $user_model = new UserModel();
        $search = $this->request->getVar('search') ?? '';
        $data['users'] = $user_model->search_data($search);
        $data['pager'] = $user_model->pager;
        $data['order_number'] = order_page_number($this->request->getVar('page_users'), 5);
        if ($this->request->isAJAX()) {
            return view('users/_users', $data);
        } else {
            $data['main_view'] = 'users/index';
            return view('layout', $data);
        }
    }

    public function new()
    {
        $data['main_view'] = 'users/new';
        return view('layout', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'name' => "required|alpha_numeric_space",
            'email' => 'required|valid_email',
            'password' => 'required|alpha_numeric_space',
            'status_id' => 'required|integer'
        ])) {
            $data['main_view'] = 'users/new';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }

        $user_model = new UserModel();
        $user_model->create_data($this->request);
        $this->session->setFlashdata('success', 'User berhasil disimpan');
        return redirect()->to('/users');
    }

    public function delete($id){
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $user_model = new UserModel();
            if($user_model->delete($id)){
                $data = [
                    'status' => 200,
                    'message' => 'User berhasil dihapus',
                    'id' => $id
                ];
            } else {
                $data = [
                    'status' => 500,
                    'message' => 'User gagal dihapus karena tidak duserukan. Coba refresh kembali.',
                    'id' => $id
                ];
            }
        } else {
            $data = [
                'status' => 500,
                'message' => 'Anda tidak diizinkan untuk menghapus data',
                'id' => null
            ];
        }
        echo json_encode($data);
    }

    public function edit($id){
        $user_model = new UserModel();
        $data['main_view'] = 'users/edit';
        $data['user'] = $user_model->get_data($id);
        return view('layout', $data);
    }

    public function update($id){
        if (!$this->validate([
            'name' => "required|alpha_numeric_space",
            'email' => 'required|valid_email',
            'password' => 'required|alpha_numeric_space',
            'status_id' => 'required|integer'
        ])) {
            $user_model = new UserModel();
            $data['main_view'] = 'users/edit';
            $data['errors'] = $this->validator;
            $data['user'] = $user_model->get_data($id);
            return view('layout', $data);
        }

        $user_model = new UserModel();
        $user_model->update_data($id, $this->request);
        $this->session->setFlashdata('success', 'User berhasil diperbarui');
        return redirect()->to('/users');
    }

    public function show($id){
        $user_model = new UserModel();
        $data['user'] = $user_model->get_data($id);
        return view('users/show', $data);
    }
}
