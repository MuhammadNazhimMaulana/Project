<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembelian_Obat_M extends Model
{
    protected $table = 'pembelian_obat';

    protected $primaryKey = 'id_pembelian';

    protected $allowedFields = ['id', 'id_pasien', 'id_transaksi', 'id_obat', 'jumlah_beli', 'jumlah_bayar', 'bukti_bayaran'];

    protected $validationRules = [
        'jumlah_beli' => 'numeric',
        'jumlah_bayar' => 'numeric'
    ];

    protected $validationMessages = [
        'jumlah_beli' => [
            'numeric' => 'Harus Memasukkan Angka'
        ],
        'jumlah_bayar' => [
            'numeric' => 'Hanya Boleh Memasukkan Angka'
        ],
    ];

    public function get_data() //Function yang digunakan untuk melakukan join
    {

        return $this->db->table('pembelian_obat')
            ->join('users', 'users.id = pembelian_obat.id')
            ->join('pasien', 'pasien.id_pasien = pembelian_obat.id_pasien')
            ->join('transaksi', 'transaksi.id_transaksi = pembelian_obat.id_transaksi')
            ->join('obat', 'obat.id_obat = pembelian_obat.id_obat')
            ->get()->getResultArray();
    }
}
