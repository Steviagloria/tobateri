<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiMasukModel extends Model {

    protected $table = 'transaksi_masuk_tb';
    protected $primaryKey = 'id_transaksi_masuk';
    protected $allowedFields = ['idx_barang', 'idx_supplier', 'waktu_transaksi_masuk'];

}