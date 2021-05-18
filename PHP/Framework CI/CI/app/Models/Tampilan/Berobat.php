<?php

namespace App\Models\Tampilan;

use CodeIgniter\Model;

class Berobat extends Model
{
    // public function __construct()
    // {
    //     //koneksinya ini
    //     $this->koneksi = db_connect();
    // }

    protected $table = 'obat';
    protected $primaryKey = "id_obat";
    protected $allowedFields = ['nama_obat', 'stok', 'tanggal_kadaluarsa', 'perusahaan'];

    public function tambah($data)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('obat')->insert($data);
    }

    public function getAllData()
    {
        return $this->table('obat')->get()->getResultArray();
    }

    public function Data($id)
    {
        return $this->table('obat')->where('id_obat', $id)->get()->getRowArray();
    }

    public function update_obat($data, $id)
    {
        $this->koneksi = db_connect();
        return $this->koneksi->table('obat')->update($data, ['id_obat' => $id]);
    }

    public function cari($keyword)
    {
        // $builder = $this->table('obat');
        // $builder->like('nama_obat', $keyword);
        // return $builder;

        return $this->table('obat')->like('nama_obat', $keyword);
    }
}
