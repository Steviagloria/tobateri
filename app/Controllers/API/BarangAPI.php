<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use CodeIgniter\API\ResponseTrait;

class BarangAPI extends BaseController
{

    protected $model;

    use ResponseTrait;

    function __construct()
    {
        $this->model = new BarangModel();
    }

    public function list()
    {
        $data = [
            'id' => '1',
            'nama' => 'Laptop'
        ];

        return $this->respond($data);
    }

    public function add()
    {
        $requestpost = $this->request->getPost();

        if (!$this->model->addBarang($requestpost)) {
            return $this->failForbidden('Gagal insert data', 500);
        }

        return $this->respond([
            'status' => 200,
            'message' => 'Data barang berhasil ditambahkan'
        ]);
    }

    public function delete()
    {

        $ids = $this->request->getPost();

        if ($this->model->delete($ids)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Barang berhasil dihapus.'
            ]);
        }
    }

    public function put()
    {
        $data = $this->request->getPost();
        $this->model->where('id_barang', $data['id_barang']);
        if ($this->model->save($data)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Satuan Baru berhasil diubah ke database.'
            ]);
        }
    }
}
