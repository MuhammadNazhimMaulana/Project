<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Barang extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setGambar($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './uploads';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['gambar'] = $fileName;
        return $this;
    }
}
