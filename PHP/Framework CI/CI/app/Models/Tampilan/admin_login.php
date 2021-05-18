<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class admin_login extends Model
{
    protected $table = 'admin';
    protected $primaryKey = "id_admin";
    protected $allowedFields = ['nama', 'username', 'password', 'level'];

    public function cek_login($username, $password)
    {
        return $this->db->table('admin')->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }

    public function getAllData()
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('admin')->get()->getResultArray();
    }
}
