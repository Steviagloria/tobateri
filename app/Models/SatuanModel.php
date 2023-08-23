<?php

namespace App\Models;
use CodeIgniter\Model;

class SatuanModel extends Model {
    
    protected $table = 'satuans_tb';
    protected $primaryKey = 'id_satuan';
    protected $allowedFields = ['id_satuan', 'nama_satuan'];

    public function add($data)
    {
        return $this->insert($data);
    }

    public function getAllData()
    {
        return $this->findAll();
    }

    // public function findById($id)
    // {
    //     $data = $this->where('id_satuan', $id);
    //     var_dump($data->getResult());
    // }

}