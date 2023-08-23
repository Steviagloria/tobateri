<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\SatuanModel;
use CodeIgniter\API\ResponseTrait;

class SatuanAPI extends BaseController {

    use ResponseTrait;
    
    private $model;

    function __construct()
    {
        $this->model = new SatuanModel();
    }

    public function add()
    {
        if ($this->model->add($this->request->getPost())) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Satuan Baru berhasil ditambahkan.'
            ]);
        }
    }

    public function put()
    {
        $data = $this->request->getPost();

        if ($this->model->query('UPDATE satuans_tb SET nama_satuan = "'. $data['nama_satuan'] . '"' . ' WHERE id_satuan = ' . $data['id_satuan'])) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Satuan Baru berhasil diubah ke database.'
            ]);
        }
    }

    public function delete()
    {
        
        $ids = $this->request->getPost();

        if ($this->model->delete($ids)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Satuan berhasil dihapus.'
            ]);
        }

    }

}