<?php

namespace App\Models;

use CodeIgniter\Model;

class Pasien_M extends Model
{
    protected $table = 'pasien';

    protected $primaryKey = 'id_pasien';

    protected $allowedFields = ['id', 'jadwal_periksa', 'id_dokter', 'id_ruang', 'id_daftar', 'id_obat'];

    protected $validationRules = [
        'id_ruang' => 'numeric'
    ];

    protected $validationMessages = [
        'id_ruang' => [
            'numeric' => 'Silakan Pilih Dengan Benar'
        ]
    ];

    public function get_data() //Function yang digunakan untuk melakukan join
    {
        return $this->db->table('pasien')
            ->join('users', 'users.id = pasien.id')
            ->join('dokter', 'dokter.id_dokter = pasien.id_dokter')
            ->join('ruang', 'ruang.id_ruang = pasien.id_ruang')
            ->join('pendaftaran', 'pendaftaran.id_daftar = pasien.id_daftar')
            ->join('obat', 'obat.id_obat = pasien.id_obat')
            ->get()->getResultArray();
    }
}
