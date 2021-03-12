<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class beli_obat extends Model
{
    // public function __construct()
    // {
    //     //koneksinya ini
    //     $this->koneksi = db_connect();
    // }

    protected $table = 'pembelian_obat';
    protected $primaryKey = "id_pembelian";
    protected $allowedFields = ['id', ' id_pasien', 'id_transaksi', 'id_obat', 'jumlah_beli', 'jumlah_bayar', 'bukti_bayar'];

    public function tambah($data)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('pembelian_obat')->insert($data);
    }

    public function getAllData()
    {
        return $this->table('pembelian_obat')->join('transaksi', 'transaksi.id_transaksi = pembelian_obat.id_transaksi')
            ->join('pasien', 'pasien.id_pasien = pembelian_obat.id_pasien')
            ->join('obat', 'obat.id_obat = pembelian_obat.id_obat')
            ->join('users', 'users.id = pembelian_obat.id')
            ->get()->getResultArray();
    }

    public function Data($id)
    {
        return $this->table('pembelian_obat')->where('id_pembelian', $id)->get()->getRowArray();
    }

    public function update_pembelian($data, $id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('pembelian_obat')->update($data, ['id_pembelian' => $id]);
    }

    public function cari($keyword)
    {
        // $builder = $this->table('obat');
        // $builder->like('nama_obat', $keyword);
        // return $builder;

        return $this->table('pembelian_obat')->like('jumlah_beli', $keyword);
    }
}
