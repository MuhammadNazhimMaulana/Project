<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class bayar extends Model
{
    // public function __construct()
    // {
    //     //koneksinya ini
    //     $this->koneksi = db_connect();
    // }

    protected $table = 'transaksi';
    protected $primaryKey = "id_transaksi";
    protected $allowedFields = ['id', 'id_pasien', 'biaya_pembayaran', 'nama_kasir', 'bukti_bayar', 'ket', 'tanggal'];

    public function tambah($data)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('transaksi')->insert($data);
    }

    public function getAllData()
    {
        return $this->table('transaksi')
            ->join('pasien', 'pasien.id_pasien = transaksi.id_pasien')
            ->join('users', 'users.id = transaksi.id')
            ->get()->getResultArray();
    }

    public function Data($id)
    {
        return $this->table('transaksi')->where('id_transaksi', $id)->get()->getRowArray();
    }

    public function update_pembayaran($data, $id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('transaksi')->update($data, ['id_transaksi' => $id]);
    }

    public function cari($keyword)
    {
        // $builder = $this->table('obat');
        // $builder->like('nama_obat', $keyword);
        // return $builder;

        return $this->table('transaksi')->like('nama_pasien', $keyword);
    }
}
