<?php

namespace App\Models;

use CodeIgniter\Model;

class Ruang_M extends Model
{
    protected $table = 'ruang';

    protected $primaryKey = 'id_ruang';

    protected $allowedFields = ['nama_ruang', 'kapasitas'];

    protected $validationRules = [
        'nama_ruang' => 'min_length[3]',
        'kapasitas' => 'numeric'
    ];

    protected $validationMessages = [
        'nama_ruang' => [
            'min_length' => 'Minimal menggunakan 3 huruf'
        ],
        'kapasitas' => [
            'numeric' => 'Hanya Boleh Memasukkan Angka'
        ],
    ];
}
