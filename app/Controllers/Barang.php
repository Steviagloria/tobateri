<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\SatuanModel;

class Barang extends BaseController
{

    private $satuanModel;
    private $model;

    function __construct()
    {
        $this->satuanModel = new SatuanModel();
        $this->model = new BarangModel();
    }

    public function index()
    {

        $result = $this->model->getAllData();

        $data = [
            'title' => 'Stok Barang',
            'navTitle' => 'Data Barang',
            'resultBarang' => $result
        ];

        return view('pages/barang', $data);
        
    }

    public function tambah()
    {

        $satuans = $this->satuanModel->getAllData();

        $data = [
            'title' => 'Tambah Data Barang',
            'navTitle' => 'Form Data Barang',
            'satuans' => $satuans
        ];
        return view('pages/form-barang', $data);
    }

    public function ubah($id)
    {
        $result = $this->model->getById($id);
        $satuans = $this->satuanModel->getAllData();

        $data = [
            'title' => 'Ubah Barang',
            'navTitle' => 'Form Data Barang',
            'satuans' => $satuans,
            'dataBarang' => $result
        ];

        return view('pages/form-barang', $data);
    }

}
