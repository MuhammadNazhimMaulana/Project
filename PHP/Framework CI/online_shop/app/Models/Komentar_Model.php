<?php

namespace App\Models;

use CodeIgniter\Model;

class Komentar_Model extends Model
{
    protected $table = 'tbl_komentar';
    protected $primaryKey = 'id_komentar';
    protected $allowedFields = ['id_user', 'id_barang', 'komentar', 'created_by', 'created_date', 'updated_by', 'updated_date'];

    protected $returnType = 'App\Entities\Komentar';
    protected $useTimestamps = false;
}
