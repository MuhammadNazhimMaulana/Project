<?php

namespace App\Models;

use CodeIgniter\Model;

class Laporan_M extends Model
{
    protected $table = 'laporan_pengunjung';

    protected $primaryKey = 'id_laporan';

    protected $allowedFields = ['id_transaksi', 'id_admin', 'tanggal_bergabung', 'tanggal_keluar', 'total_transaksi'];

    protected $validationRules = [
        'total_transaksi' => 'numeric'
    ];

    protected $validationMessages = [
        'total_transaksi' => [
            'numeric' => 'Hanya Boleh Memasukkan Angka'
        ],
    ];

    public function get_data() //Function yang digunakan untuk melakukan join
    {
        return $this->db->table('laporan_pengunjung')
            ->join('transaksi', 'transaksi.id_transaksi = laporan_pengunjung.id_transaksi')
            ->join('admin', 'admin.id_admin = laporan_pengunjung.id_admin')
            ->get()->getResultArray();
    }
}
