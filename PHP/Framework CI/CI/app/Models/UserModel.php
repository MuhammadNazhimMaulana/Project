<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['firstname', 'lastname', 'ktp', 'alamat', 'kota', 'provinsi', 'kode_pos', 'email', 'password'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];



    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);


        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);


        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    public function getAllData()
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('users')->get()->getResultArray();
    }
}
