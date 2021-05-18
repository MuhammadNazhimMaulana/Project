<?php

namespace App\Models;

use CodeIgniter\Model;

class Obat_M extends Model
{
    protected $table = 'obat';

    protected $primaryKey = 'id_obat';

    protected $allowedFields = ['nama_obat', 'stok', 'tanggal_kadaluarsa', 'perusahaan'];

    protected $validationRules = [
        'nama_obat' => 'min_length[3]',
        'stok' => 'numeric'
    ];

    protected $validationMessages = [
        'nama_obat' => [
            'min_length' => 'Minimal menggunakan 3 huruf'
        ],
        'stok' => [
            'numeric' => 'Hanya Boleh Memasukkan Angka'
        ],
    ];
}
