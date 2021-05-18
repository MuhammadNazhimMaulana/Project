<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_M extends Model
{
    protected $table = 'pendaftaran';

    protected $primaryKey = 'id_daftar';

    protected $allowedFields = ['nama', 'sakit', 'id_dokter', 'kebutuhan'];

    protected $validationRules = [
        'kebutuhan' => 'min_length[3]',
        'sakit' => 'min_length[3]'
    ];

    protected $validationMessages = [
        'kebutuhan' => [
            'min_length' => 'Minimal Memasukkan 3 Huruf'
        ],
        'sakit' => [
            'min_length' => 'Minimal Memasukkan 3 Huruf'
        ],
    ];

    public function get_data() //Function yang digunakan untuk melakukan join
    {
        return $this->db->table('pendaftaran')
            ->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter')
            ->get()->getResultArray();
    }
}
