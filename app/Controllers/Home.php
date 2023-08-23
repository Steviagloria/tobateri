<?php

namespace App\Controllers;
use App\Models\BarangModel;
use App\Models\SupplierModel;
use App\Models\TransaksiKeluarModel;
use App\Models\TransaksiMasukModel;

class Home extends BaseController
{

    private $barangModel, $supplierModel, $tsMasukModel, $tsKeluarModel;

    function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->supplierModel = new SupplierModel();
        $this->tsMasukModel = new TransaksiMasukModel();
        $this->tsKeluarModel = new TransaksiKeluarModel();
    }

    public function index()
    {

        $totalBarang = count($this->barangModel->findAll());
        $totalSupplier = count($this->supplierModel->findAll());
        $totalTsMasuk = count($this->tsMasukModel->findAll());
        $totalTsKeluar = count($this->tsKeluarModel->findAll());

        $data = [
            'title' => 'Home',
            'navTitle' => 'Dashboard',
            'dataCount' => [
                'barang' => $totalBarang,
                'supplier' => $totalSupplier,
                'tsMasuk' => $totalTsMasuk,
                'tsKeluar' => $totalTsKeluar
            ]
        ];
        return view('pages/home', $data);
    }
}
