<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin_M;

class Login_Admin extends BaseController
{
    public function index()
    {
        $data = [];
        if ($this->request->getMethod() ==  'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $model = new Admin_M();
            $admin = $model->where(['username' => $username])->first();

            // if (empty($admin)) {
            //     $data['info'] = "Username yang dimasukkan salah";
            // } else {
            //     if (password_verify($password, $admin['password'])) {
            //         $this->setSession($admin);
            //         return redirect()->to(base_url('/admin'));
            //     } else {
            //         $data['info'] = "Password yang digunakan salah";
            //     }
            // } 
            // Ini yang di atas untuk yang menggunakan password hash

            if (empty($admin)) {
                $data['info'] = "Username atau Password yang digunakan salah";
                //   Kode diatas sama dengan $data = [
                //       'info' => 'Username atau password salah'
                //   ];
            } else {
                $this->setSession($admin);
                return redirect()->to(base_url('/admin'));
            }
        } else {
        }
        return view('template/login', $data);
    }

    public function setSession($admin)
    {

        $data = [
            'nama' => $admin['nama'],
            'username' => $admin['username'],
            'level' => $admin['level'],
            'loggedIn' => true
        ];


        session()->set($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
