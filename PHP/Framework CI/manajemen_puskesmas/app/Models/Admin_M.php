<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_M extends Model
{
    protected $table = 'admin';

    protected $primaryKey = 'id_admin';

    protected $allowedFields = ['nama', 'username', 'password', 'level'];

    protected $validationRules = [
        'username' => 'min_length[3]'
    ];

    protected $validationMessages = [
        'username' => [
            'min_length' => 'Minimal menggunakan 3 huruf'
        ]
    ];
}
