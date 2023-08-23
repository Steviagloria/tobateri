<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model {

    protected $table = 'barangs_tb';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang', 'jumlah_barang', 'harga_barang', 'nama_satuan_fg'];

    public function addBarang($data)
    {
        return $this->insert($data, false);
    }

    public function getAllData()
    {
        $this->join('satuans_tb', 'satuans_tb.nama_satuan = barangs_tb.nama_satuan_fg');
        return $this->findAll();
    }

    public function getById($id)
    {
        // Join ke Tabel Satuan
        $this->join('satuans_tb', 'satuans_tb.nama_satuan = barangs_tb.nama_satuan_fg');
        
        // Ambil data barang berdasarkan ID
        $this->where('id_barang', $id);

        return $this->find()[0];
    }

}