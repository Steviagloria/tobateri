<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\SupplierModel;
use App\Models\TransaksiKeluarModel;
use App\Models\TransaksiMasukModel;

class Transaksi extends BaseController
{

    private $barangModel, $supplierModel, $transaksiMasukModel, $transaksiKeluarModel;

    function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->supplierModel = new SupplierModel();
        $this->transaksiMasukModel = new TransaksiMasukModel();
        $this->transaksiKeluarModel = new TransaksiKeluarModel();
    }

    public function masuk()
    {

        // Select & Join data yang diperlukan
        $this->transaksiMasukModel->select(['id_transaksi_masuk', 'id_barang', 'id_supplier', 'nama_barang', 'nama_supplier', 'waktu_transaksi_masuk', 'jumlah_barang', 'nama_satuan_fg']);
        $this->transaksiMasukModel->join('barangs_tb', 'barangs_tb.id_barang = transaksi_masuk_tb.idx_barang');
        $this->transaksiMasukModel->join('suppliers_tb', 'suppliers_tb.id_supplier = transaksi_masuk_tb.idx_supplier');

        $tm = $this->transaksiMasukModel->findAll();

        $data = [
            'title' => 'Transaksi Masuk',
            'navTitle' => 'Data Transaksi Masuk',
            'dataTransaksiMasuk' => $tm
        ];
        return view('pages/transaksi-masuk', $data);
    }

    public function keluar()
    {

        $this->transaksiKeluarModel->select(['id_transaksi_keluar', 'idx_barang', 'id_barang', 'harga_barang', 'nama_barang', 'jumlah_barang_keluar', 'nama_penjual', 'waktu_transaksi_keluar', 'nama_satuan_fg']);
        $this->transaksiKeluarModel->join('barangs_tb', 'barangs_tb.id_barang = transaksi_keluar_tb.idx_barang');

        $tk = $this->transaksiKeluarModel->findAll();

        $data = [
            'title' => 'Transaksi Keluar',
            'navTitle' => 'Data Transaksi Keluar',
            'dataTransaksiKeluar' => $tk
        ];
        return view('pages/transaksi-keluar', $data);
    }

    public function addTransaksiMasuk()
    {

        $this->barangModel->select(['id_barang', 'nama_barang']);
        $this->supplierModel->select(['id_supplier', 'nama_supplier']);

        $barangs = $this->barangModel->findAll();
        $suppliers = $this->supplierModel->findAll();

        $data = [
            'title' => 'Tamabah Transaksi Masuk',
            'navTitle' => 'Data Transaksi Masuk',
            'barangs' => $barangs,
            'suppliers' => $suppliers
        ];

        return view('pages/form-transaksi-masuk', $data);
    }

    public function changeTransaksiKeluar($id)
    {

        $this->transaksiKeluarModel->where('id_transaksi_keluar', $id);

        $this->transaksiKeluarModel->select(['id_transaksi_keluar', 'id_barang', 'nama_penjual', 'nama_barang', 'jumlah_barang_keluar', 'waktu_transaksi_keluar']);
        $this->transaksiKeluarModel->join('barangs_tb', 'barangs_tb.id_barang = transaksi_keluar_tb.idx_barang');

        $this->barangModel->select(['id_barang', 'nama_barang']);
        $this->supplierModel->select(['id_supplier', 'nama_supplier']);

        $tk = $this->transaksiKeluarModel->find()[0];

        $barangs = $this->barangModel->findAll();

        $data = [
            'title' => 'Tamabah Transaksi Keluar',
            'navTitle' => 'Data Transaksi Keluar',
            'barangs' => $barangs,
            'dataTransaksiKeluar' => $tk
        ];

        return view('pages/form-transaksi-keluar', $data);
    }
    public function changeTransaksiMasuk($id)
    {

        $this->transaksiMasukModel->where('id_transaksi_masuk', $id);

        $this->transaksiMasukModel->select(['id_transaksi_masuk', 'id_barang', 'id_supplier', 'nama_barang', 'nama_supplier', 'waktu_transaksi_masuk']);
        $this->transaksiMasukModel->join('barangs_tb', 'barangs_tb.id_barang = transaksi_masuk_tb.idx_barang');
        $this->transaksiMasukModel->join('suppliers_tb', 'suppliers_tb.id_supplier = transaksi_masuk_tb.idx_supplier');

        $this->barangModel->select(['id_barang', 'nama_barang']);
        $this->supplierModel->select(['id_supplier', 'nama_supplier']);

        $tm = $this->transaksiMasukModel->find()[0];

        $barangs = $this->barangModel->findAll();
        $suppliers = $this->supplierModel->findAll();

        $data = [
            'title' => 'Tamabah Transaksi Masuk',
            'navTitle' => 'Data Transaksi Keluar',
            'barangs' => $barangs,
            'suppliers' => $suppliers,
            'dataTransaksiMasuk' => $tm
        ];

        return view('pages/form-transaksi-masuk', $data);
    }

    public function addTransaksiKeluar()
    {

        // $this->transaksiKeluarModel->select(['idx_barang', 'id_barang', 'nama_barang', 'jumlah_barang', 'nama_penjual', 'waktu_transaksi_keluar']);
        $this->transaksiKeluarModel->join('barangs_tb', 'barangs_tb.id_barang = transaksi_keluar_tb.idx_barang');

        $tk = $this->transaksiKeluarModel->findAll();

        $barangs = $this->barangModel->findAll();

        $data = [
            'title' => 'Transaksi Keluar',
            'navTitle' => 'Data Transaksi Keluar',
            'barangs' => $barangs
        ];

        return view('pages/form-transaksi-keluar', $data);
    }
}
