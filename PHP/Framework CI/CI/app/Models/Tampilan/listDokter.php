<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class listDokter extends Model
{

    public function getAllData()
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('dokter')->get()->getResultArray();
    }
    public function getData()
    {
        return $this->table('dokter')->get()->getResultArray();
    }

    public function Data($id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('dokter')->where('id_dokter', $id)->get()->getRowArray();
    }

    public function tambah($data)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('dokter')->insert($data);
    }

    public function update_dokter($data, $id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('dokter')->update($data, ['id_dokter' => $id]);
    }

    protected $table = 'dokter';
    protected $primaryKey = "id_dokter";
    protected $allowedFields = ['nama_dokter', 'rumah_sakit', 'spesialis', 'jadwal_hari', 'jadwal_waktu', 'jenis_klinik'];

    public function cari($keyword)
    {
        // $builder = $this->table('obat');
        // $builder->like('nama_obat', $keyword);
        // return $builder;

        return $this->table('dokter')->like('nama_dokter', $keyword);
    }
}
