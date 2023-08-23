<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController {

    private $model;

    use ResponseTrait;

    function __construct()
    {
        $this->model = new AdminModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('pages/login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

}