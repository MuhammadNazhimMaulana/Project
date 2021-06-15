<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_Model extends Model
{
    protected $table = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_user', 'id_barang', 'jumlah', 'total_harga', 'created_by', 'created_date', 'updated_by', 'updated_date', 'alamat', 'ongkir', 'status'];

    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = false;
}
