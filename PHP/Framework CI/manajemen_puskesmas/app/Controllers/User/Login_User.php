<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Users_M;

class Login_User extends BaseController
{
    public function index()
    {
        $data = [];
        if ($this->request->getMethod() ==  'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new Users_M();
            $user = $model->where(['email' => $email])->first();

            if (empty($user)) {
                $data['info'] = "Email yang dimasukkan salah";
            } else {
                if (password_verify($password, $user['password'])) {
                    $this->setSession($user);
                    return redirect()->to(base_url('/user/home_user'));
                } else {
                    $data['info'] = "Password yang digunakan salah";
                }
            }
        } else {
        }
        return view('template/user_login', $data);
    }


    public function setSession($user)
    {

        $data = [
            'email' => $user['email'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'loggedIn' => true
        ];


        session()->set($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login_pengguna'));
    }
}
