<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokter_M extends Model
{
    protected $table = 'dokter';

    protected $primaryKey = 'id_dokter';

    protected $allowedFields = ['nama_dokter', 'rumah_sakit', 'spesialis', 'jadwal_hari', 'jadwal_waktu', 'jenis_klinik'];

    protected $validationRules = [
        'nama_dokter' => 'min_length[3]'
    ];

    protected $validationMessages = [
        'nama_dokter' => [
            'min_length' => 'Minimal menggunakan 3 huruf'
        ]
    ];
}
