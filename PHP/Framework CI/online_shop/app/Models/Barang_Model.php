<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_Model extends Model
{
    protected $table = 'tbl_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang', 'harga', 'stok', 'gambar', 'created_by', 'created_date', 'updated_by', 'updated_date'];

    protected $returnType = 'App\Entities\Barang';
    protected $useTimestamps = false;
}
