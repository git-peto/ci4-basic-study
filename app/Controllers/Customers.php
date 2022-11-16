<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class Customers extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $customer_model = new CustomerModel();
        $search = $this->request->getVar('search') ?? '';
        $data['customers'] = $customer_model->search_data($search);
        $data['pager'] = $customer_model->pager;
        $data['order_number'] = order_page_number($this->request->getVar('page_customers'), 5);
        if ($this->request->isAJAX()) {
            return view('customers/_customers', $data);
        } else {
            $data['main_view'] = 'customers/index';
            return view('layout', $data);
        }
    }

    public function new()
    {
        $data['main_view'] = 'customers/new';
        return view('layout', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'name' => "required|alpha_numeric_space",
            'status_id' => 'required|integer'
        ])) {
            $data['main_view'] = 'customers/new';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }

        $customer_model = new CustomerModel();
        $customer_model->create_data($this->request);
        $this->session->setFlashdata('success', 'customer berhasil disimpan');
        return redirect()->to('/customers');
    }

    public function delete($id){
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $customer_model = new CustomerModel();
            if($customer_model->delete($id)){
                $data = [
                    'status' => 200,
                    'message' => 'customer berhasil dihapus',
                    'id' => $id
                ];
            } else {
                $data = [
                    'status' => 500,
                    'message' => 'customer gagal dihapus karena tidak dcustomerukan. Coba refresh kembali.',
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
        $customer_model = new CustomerModel();
        $data['main_view'] = 'customers/edit';
        $data['customer'] = $customer_model->get_data($id);
        return view('layout', $data);
    }

    public function update($id){
        if (!$this->validate([
            'name' => "required|alpha_numeric_space",
            'status_id' => 'required|integer'
        ])) {
            $customer_model = new CustomerModel();
            $data['main_view'] = 'customers/edit';
            $data['errors'] = $this->validator;
            $data['customer'] = $customer_model->get_data($id);
            return view('layout', $data);
        }

        $customer_model = new CustomerModel();
        $customer_model->update_data($id, $this->request);
        $this->session->setFlashdata('success', 'customer berhasil diperbarui');
        return redirect()->to('/customers');
    }

    public function show($id){
        $customer_model = new CustomerModel();
        $data['customer'] = $customer_model->get_data($id);
        return view('customers/show', $data);
    }
}
