<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class laporan extends Model
{
    // public function __construct()
    // {
    //     //koneksinya ini
    //     $this->koneksi = db_connect();
    // }

    protected $table = 'laporan_pengunjung';
    protected $primaryKey = "id_laporan";
    protected $allowedFields = ['id_transaksi', 'id_admin', 'tanggal_bergabung', 'tanggal_keluar', 'total_transaksi'];

    public function tambah($data)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('laporan_pengunjung')->insert($data);
    }

    public function getAllData()
    {
        return $this->table('laporan_pengunjung')
            ->join('transaksi', 'transaksi.id_transaksi = laporan_pengunjung.id_transaksi')
            ->join('admin', 'admin.id_admin = laporan_pengunjung.id_admin')
            ->get()->getResultArray();
    }

    public function Data($id)
    {
        return $this->table('laporan_pengunjung')->where('id_laporan', $id)->get()->getRowArray();
    }

    public function update_laporan_pengunjung($data, $id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('laporan_pengunjung')->update($data, ['id_laporan' => $id]);
    }

    public function cari($keyword)
    {
        // $builder = $this->table('obat');
        // $builder->like('nama_obat', $keyword);
        // return $builder;

        return $this->table('laporan_pengunjung')->like('tanggal_bergabung', $keyword);
    }
}
