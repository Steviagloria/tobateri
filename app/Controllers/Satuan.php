<?php

namespace App\Controllers;

use App\Models\SatuanModel;

class Satuan extends BaseController
{

    private $model;

    function __construct()
    {
        $this->model = new SatuanModel();
    }

    public function index()
    {

        $result = $this->model->getAllData();

        $data = [
            'title' => 'Satuan',
            'navTitle' => 'Data Satuan',
            'result' => $result
        ];

        return view('pages/satuan', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Satuan',
            'navTitle' => 'Form Data Satuan'
        ];
        return view('pages/form-satuan', $data);
    }

    public function ubah($id)
    {
        $this->model->where('id_satuan', $id);
        $result = $this->model->find()[0];

        // var_dump($result);
        // exit;

        $data = [
            'title' => 'Ubah Satuan',
            'navTitle' => 'Form Data Satuan',
            'satuan' => $result
        ];

        return view('pages/form-satuan', $data);
    }

}
