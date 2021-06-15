<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User_Model;
use App\Entities\User;

class Authorisasi extends BaseController
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

    public function register()
    {
        if ($this->request->getPost()) {

            // Validasi data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'register');

            $errors = $this->validation->getErrors();

            //Jika tidak ada error
            if (!$errors) {

                $model = new User_Model();
                $user = new User();

                $user->username = $this->request->getPost('username');
                $user->password = $this->request->getPost('password');

                $user->created_by = 0;
                $user->created_date = date("Y-m-d H:i:s");

                $model->save($user);

                return view('template/login');
            }

            $this->session->setFlashdata('errors', $errors);
        }
        return view('template/register');
    }

    public function login()
    {
        if ($this->request->getPost()) {

            // Validasi data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');

            $errors = $this->validation->getErrors();

            if ($errors) {
                return view('login');
            }

            $model = new User_Model();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->where('username', $username)->first();

            if ($user) {
                $salt = $user->salt;
                if ($user->password !== md5($salt . $password)) {

                    $this->session->setFlashdata('errors', ['Password Salah']);
                } else {
                    $session_data = [
                        'username' => $user->username,
                        'id_user' => $user->id_user,
                        'role' => $user->role,
                        'isLoggedIn' => TRUE
                    ];

                    $this->session->set($session_data);

                    return redirect()->to(site_url('Home/index'));
                }
            } else {
                $this->session->setFlashdata('errors', ['User Tidak Ditemukan']);
            }
        }
        return view('template/login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('auth/authorisasi/login'));
    }
}
