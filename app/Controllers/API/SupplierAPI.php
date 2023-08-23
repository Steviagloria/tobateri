<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use CodeIgniter\API\ResponseTrait;

class SupplierAPI extends BaseController {

    protected $model;

    use ResponseTrait;

    function __construct()
    {
        $this->model = new SupplierModel();
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

        if(!$this->model->insert($requestpost)) {
            return $this->failForbidden('Gagal insert data', 500);
        }
        
        return $this->respond([
            'status' => 200,
            'message' => 'Data barang berhasil ditambahkan'
        ]);
    }

    public function delete()
    {

        $data = $this->request->getPost();

        if ($this->model->delete($data['id_supplier'])) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Supplier berhasil dihapus dari database.'
            ]);
        }
    }

    public function put()
    {
        $data = $this->request->getPost();
        $this->model->where('id_supplier', $data['id_supplier']);
        if ($this->model->save($data)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Data Supplier berhasil diubah ke database.'
            ]);
        }
    }

}