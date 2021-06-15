<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\Barang_Model;
use App\Models\User_Model;
use App\Models\Transaksi_Model;
use App\Entities\Barang;
use App\Entities\User;

class User_C extends BaseController
{

    public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

        // Load Session
        $this->session = session();
    }

    // Index untuk melihat seluruh data
    public function index()
    {
        $model = new User_Model();

        $data = [
            'users' => $model->paginate(1),
            'pager' => $model->pager
        ];

        return view('Users/index_user', $data);
    }
}
