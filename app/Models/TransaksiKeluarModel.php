<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiKeluarModel extends Model {

    protected $table = 'transaksi_keluar_tb';
    protected $primaryKey = 'id_transaksi_keluar';
    protected $allowedFields = ['idx_barang', 'nama_penjual', 'jumlah_barang_keluar', 'waktu_transaksi_keluar'];

}