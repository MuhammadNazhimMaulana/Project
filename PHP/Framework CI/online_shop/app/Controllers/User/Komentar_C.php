<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\Barang_Model;
use App\Models\User_Model;
use App\Models\Komentar_Model;
use App\Entities\Komentar;

class Komentar_C extends BaseController
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
    public function create()
    {
        $id_barang = $this->request->uri->getSegment(4);
        $model = new Komentar_Model();

        $data = [
            'id_barang' => $id_barang,
            'model' => $model,
        ];

        if ($this->request->getPost()) {
            $data_komen = $this->request->getPost();
            $this->validation->run($data_komen, 'komentar');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $entitas_komentar = new Komentar();

                $entitas_komentar->fill($data_komen);
                $entitas_komentar->created_by = $this->session->get('id_user');
                $entitas_komentar->created_date = date("Y-m-d H:i:s");

                $model->save($entitas_komentar);

                $segments = ['User', 'Etalase_C', 'beli', $id_barang];

                return redirect()->to(site_url($segments));
            }
        }

        return view('Komentar/create_komentar', $data);
    }
}
