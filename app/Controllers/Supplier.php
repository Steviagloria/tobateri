<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController
{

    private $model;

    function __construct()
    {
        $this->model = new SupplierModel();
    }

    public function index()
    {

        $result = $this->model->getAllData();

        $data = [
            'title' => 'Supplier',
            'navTitle' => 'Data Supplier',
            'resultSupplier' => $result
        ];
        
        return view('pages/supplier', $data);
    }
    
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Supplier',
            'navTitle' => 'Form Supplier'
        ];
        return view('pages/form-supplier', $data);
    }

    public function ubah($id)
    {
        
        $data = [
            'title' => 'Edit Data Supplier',
            'navTitle' => 'Form Supplier',
            'dataSupplier' => $this->model->getById($id)
        ];
        return view('pages/form-supplier', $data);
    }

}
