<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_M extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = ['firstname', 'lastname', 'ktp', 'alamat', 'kota', 'provinsi', 'kode_pos', 'email', 'password'];

    protected $validationRules = [
        'ktp' => 'min_length[10]|numeric',
        'kode_pos' => 'numeric'
    ];

    protected $validationMessages = [
        'ktp' => [
            'min_length' => 'Minimal menggunakan 10 huruf',
            'numeric' => 'Harus Menggunakan Angka'
        ],
        'kode_pos' => [
            'numeric' => 'Hanya Boleh Memasukkan Angka'
        ],
    ];
}
