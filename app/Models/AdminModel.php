<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin_tb';
    protected $primaryKey = 'email_admin';
    protected $allowedFields = ['email_admin', 'nama_admin', 'password_admin'];
}
