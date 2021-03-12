<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class daftar extends Model
{

    protected $table = 'pendaftaran';
    protected $primaryKey = "id_daftar";
    protected $allowedFields = ['nama', 'sakit', 'id_dokter', 'kebutuhan'];

    public function tambah($data)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('pendaftaran')->insert($data);
    }

    public function getAllData()
    {
        return $this->table('pendaftaran')->join('dokter', 'dokter.id_dokter =pendaftaran.id_dokter')->get()->getResultArray();
    }

    public function getData()
    {
        return $this->table('dokter')->get()->getResultArray();
    }

    public function Data($id)
    {
        return $this->table('pendaftaran')->where('id_daftar', $id)->get()->getRowArray();
    }

    public function update_pendaftaran($data, $id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('pendaftaran')->update($data, ['id_daftar' => $id]);
    }

    public function cari($keyword)
    {
        // $builder = $this->table('obat');
        // $builder->like('nama_obat', $keyword);
        // return $builder;

        return $this->table('pendaftaran')->like('nama', $keyword);
    }
}
