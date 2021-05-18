<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Users_M;

class User_register extends BaseController
{
    protected $session = null;

    // Dengan __construct maka tidak perlu lagi berulang-ulang panggil inisialisasi
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function read()
    // Digunakan untuk menampilkan seluruh data dokter
    {

        $pager = \Config\Services::pager();
        $model = new Users_M();
        //$dokter = $model -> findAll();

        // $data adalah sebuah array asosiatif
        $data = [
            'judul' => 'Data Pengguna',
            //'spesialis' => $dokter,
            'user' => $model->paginate(3, 'page'),
            'pager' => $model->pager,
        ];

        return view("Users/select_user", $data);
    }


    public function insert()
    {
        $request = \Config\Services::request();

        $pass = $this->request->getPost('password');

        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'ktp' => $this->request->getPost('ktp'),
            'alamat' => $this->request->getPost('alamat'),
            'kota' => $this->request->getPost('kota'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($pass, PASSWORD_DEFAULT),
        ];

        $model = new Users_M();

        if ($model->insert($data) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url("/utama"));
        } else {
            return redirect()->to(base_url("/login_pengguna"));
        }
    }

    public function find($id = null)
    // Untuk melakukan update (Sebelum masuk ke form)
    {
        $model = new Users_M();

        $user = $model->find($id);
        // $data adalah sebuah array asosiatif
        $data = [
            'judul' => 'UPDATE DATA USER',
            'user' => $user,
        ];

        return view("Users/update_user", $data);
    }


    public function update()
    //  Untuk menyimpan hasil dari update tadi
    {
        $id = $this->request->getPost('id');
        $pass = $this->request->getPost('password');

        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'ktp' => $this->request->getPost('ktp'),
            'alamat' => $this->request->getPost('alamat'),
            'kota' => $this->request->getPost('kota'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($pass, PASSWORD_DEFAULT),
        ];

        $model = new Users_M();

        if ($model->update($id, $data) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url("/admin/users/find/$id"));
        } else {
            return redirect()->to(base_url("/admin/users/read"));
        }
    }

    public function delete($id = null)
    // Untuk melakukan delete
    {
        $model = new Users_M();
        $model->delete($id);
        return redirect()->to(base_url("/admin/users/read"));
    }

    public function destroy()
    {
        echo "<h1>Proses delete data</h1>";
        $this->session->remove('nama');
        $this->session->destroy();
    }
}
