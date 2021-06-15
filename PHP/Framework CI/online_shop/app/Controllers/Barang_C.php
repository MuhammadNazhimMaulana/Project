<?php

namespace App\Controllers;

use App\Models\Barang_Model;
use App\Entities\Barang;

class Barang_C extends BaseController
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
        $model = new Barang_Model();
        $barang_barang = $model->findAll();

        $data = [
            'barang_barang' => $barang_barang,
        ];

        return view('barang/index_barang', $data);
    }

    // View digunakan untuk melihat data lebih detail (satu saja)
    public function view()
    {
        // Mengambil Id dari segment
        $id_barang = $this->request->uri->getSegment(3);

        $model = new Barang_Model();

        $barang = $model->find($id_barang);

        $data = [
            'barang' => $barang,
        ];

        return view('barang/view_barang', $data);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'barang');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Barang_Model();

                $barang = new Barang();

                // Fill untuk assign value data kecuali gambar
                $barang->fill($data);
                $barang->gambar = $this->request->getFile('gambar');
                $barang->created_by = $this->session->get('id_user');
                $barang->created_date = date("Y-m-d H:i:s");

                $model->save($barang);

                $id_barang = $model->insertID();

                $segments = ['Barang_C', 'view', $id_barang];

                // Akan redirect ke /Barang_C/view/$id_barang
                return redirect()->to(site_url($segments));
            }
        }
        return view('barang/create_barang');
    }
    public function update()
    {
        $id_barang = $this->request->uri->getSegment(3);

        $model = new Barang_Model();

        $barang = $model->find($id_barang);

        $data_barang = [
            'barang' => $barang,
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'barang_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $thing = new Barang();
                $thing->id_barang = $id_barang;
                $thing->fill($data);

                if ($this->request->getFile('gambar')->isValid()) {
                    $thing->gambar = $this->request->getFile('gambar');
                }

                $thing->updated_by = $this->session->get('id_user');
                $thing->updated_date = date("Y-m-d H:i:s");

                $model->save($thing);

                $segments = ['Barang_C', 'view', $id_barang];

                return redirect()->to(site_url($segments));
            }
        }

        return view('barang/update_barang', $data_barang);
    }
    public function delete()
    {
        $id_barang = $this->request->uri->getSegment(3);

        $model = new Barang_Model();

        $delete = $model->delete($id_barang);

        return redirect()->to(site_url('Barang_C/index'));
    }
}
