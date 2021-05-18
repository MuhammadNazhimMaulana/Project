<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class ruangan extends Model
{

    public function getAllData()
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('ruang')->get()->getResultArray();
    }
    public function getData()
    {
        return $this->table('ruang')->get()->getResultArray();
    }

    public function Data($id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('ruang')->where('id_ruang', $id)->get()->getRowArray();
    }

    public function tambah($data)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('ruang')->insert($data);
    }

    public function update_ruang($data, $id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('ruang')->update($data, ['id_ruang' => $id]);
    }

    protected $table = 'ruang';
    protected $primaryKey = "id_ruang";
    protected $allowedFields = ['nama_ruang', 'kapasitas'];

    public function cari($keyword)
    {
        // $builder = $this->table('obat');
        // $builder->like('nama_obat', $keyword);
        // return $builder;

        return $this->table('ruang')->like('nama_ruang', $keyword);
    }
}
