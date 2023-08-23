<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model {

    protected $table = 'suppliers_tb';
    protected $primaryKey = 'id_supplier';
    protected $allowedFields = ['nama_supplier', 'alamat_supplier', 'nohp_supplier'];

    public function addSupplier($data)
    {
        return $this->insert($data, false);
    }

    public function getAllData()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        $this->where('id_supplier', $id);
        return $this->find()[0];
    }

}