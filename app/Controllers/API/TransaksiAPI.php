<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\TransaksiKeluarModel;
use App\Models\TransaksiMasukModel;
use CodeIgniter\API\ResponseTrait;

class TransaksiAPI extends BaseController {

    protected $transaksiMasukModel, $transkaksiKeluarModel;

    use ResponseTrait;

    function __construct()
    {
        $this->transaksiMasukModel = new TransaksiMasukModel();
        $this->transkaksiKeluarModel = new TransaksiKeluarModel();
    }

    public function newTransaksiMasuk()
    {
        $requestpost = $this->request->getPost();

        if(!$this->transaksiMasukModel->insert($requestpost)) {
            return $this->failForbidden('Gagal insert data', 500);
        }
        
        return $this->respond([
            'status' => 200,
            'message' => 'Data Transaksi Masuk berhasil ditambahkan ke database.'
        ]);
    }

    public function changeTransaksiMasuk()
    {
        $requestpost = $this->request->getPost();

        if(!$this->transaksiMasukModel->save($requestpost)) {
            return $this->failForbidden('Gagal insert data', 500);
        }
        
        return $this->respond([
            'status' => 200,
            'message' => 'Data Transaksi Masuk berhasil diubah dalam database.'
        ]);
    }

    public function deleteTransaksiMasuk()
    {
        $id = $this->request->getPost('id_transaksi_masuk');

        if ($this->transaksiMasukModel->delete($id)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Transaksi berhasil dihapus dari database.'
            ]);
        }
    }

    public function newTransaksiKeluar()
    {
        $requestpost = $this->request->getPost();

        if(!$this->transkaksiKeluarModel->insert($requestpost)) {
            return $this->failForbidden('Gagal insert data', 500);
        }
        
        return $this->respond([
            'status' => 200,
            'message' => 'Data Transaksi Keluar berhasil ditambahkan ke database.'
        ]);
    }

    public function changeTransaksiKeluar()
    {
        $requestpost = $this->request->getPost();

        if(!$this->transkaksiKeluarModel->save($requestpost)) {
            return $this->failForbidden('Gagal insert data', 500);
        }
        
        return $this->respond([
            'status' => 200,
            'message' => 'Data Transaksi Keluar berhasil diubah dalam database.'
        ]);
    }

    public function deleteTransaksiKeluar()
    {
        $id = $this->request->getPost('id_transaksi_keluar');

        if ($this->transkaksiKeluarModel->delete($id)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Transaksi berhasil dihapus dari database.'
            ]);
        }
    }

}