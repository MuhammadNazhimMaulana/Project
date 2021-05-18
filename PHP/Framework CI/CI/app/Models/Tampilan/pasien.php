<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class pasien extends Model
{
    // public function __construct()
    // {
    //     //koneksinya ini
    //     $this->koneksi = db_connect();
    // }

    protected $table = 'pasien';
    protected $primaryKey = "id_pasien";
    protected $allowedFields = ['id', 'jadwal_periksa', 'id_dokter', 'id', 'id_ruang', 'id_daftar'];

    public function tambah($data)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('pasien')->insert($data);
    }

    public function getAllData()
    {
        return $this->table('pasien')
            ->join('users', 'users.id = pasien.id')
            ->join('ruang', 'ruang.id_ruang = pasien.id_ruang')
            ->join('pendaftaran', 'pendaftaran.id_daftar = pasien.id_daftar')
            ->join('dokter', 'dokter.id_dokter = pasien.id_dokter')
            ->join('obat', 'obat.id_obat = pasien.id_obat')->get()->getResultArray();
    }

    public function Data($id)
    {
        return $this->table('pasien')->where('id_pasien', $id)->get()->getRowArray();
    }

    public function update_pasien($data, $id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('pasien')->update($data, ['id_pasien' => $id]);
    }

    public function cari($keyword)
    {
        // $builder = $this->table('obat');
        // $builder->like('nama_obat', $keyword);
        // return $builder;

        return $this->table('pasien')->like('nama_pasien', $keyword);
    }
}
