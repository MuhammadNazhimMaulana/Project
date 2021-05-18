<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_M extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $allowedFields = ['id', 'id_pasien', 'biaya_pembayaran', 'nama_kasir', 'bukti_bayar', 'ket', 'tanggal'];

    protected $validationRules = [
        'ket' => 'min_length[3]',
        'biaya_pembayaran' => 'numeric'
    ];

    protected $validationMessages = [
        'ket' => [
            'min_length' => 'Minimal menggunakan 3 huruf'
        ],
        'biaya_pembayaran' => [
            'numeric' => 'Hanya Boleh Memasukkan Angka'
        ],
    ];

    public function get_data() //Function yang digunakan untuk melakukan join
    {
        return $this->db->table('transaksi')
            ->join('users', 'users.id = transaksi.id')
            ->join('pasien', 'pasien.id_pasien = transaksi.id_pasien')
            ->get()->getResultArray();
    }
}
