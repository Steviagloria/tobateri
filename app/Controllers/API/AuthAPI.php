<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\API\ResponseTrait;

class AuthAPI extends BaseController
{

    use ResponseTrait;

    private $model;

    function __construct()
    {
        $this->model = new AdminModel();
    }

    public function login()
    {
        $data = $this->request->getPost();

        $this->model->where('email_admin', $data['email_admin']);
        
        $result = $this->model->first();

        if ($result != null) {
            if ($result['password_admin'] == $data['password_admin']) {
                session()->set([
                    'logged_in' => TRUE
                ]);
                return $this->respond([
                    'status' => 200,
                    'message' => 'Berhasil Login! Silahkan tunggu untuk redirect otomatis.'
                ]);
            } else {
                return $this->respond([
                    'status' => 501,
                    'message' => 'Password salah! Silahkan periksa dan coba lagi.'
                ]);
            }
        }

        return $this->respond([
            'status' => 404,
            'message' => 'Data Admin tidak ditemukan dalam database. Mohon periksa kembali.'
        ]);
    }

}
