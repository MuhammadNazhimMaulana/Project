<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Tampilan\listDokter;
use App\Models\Tampilan\daftar;
use App\Models\Tampilan\Berobat;
use App\Models\Tampilan\admin_login;
use App\Models\Tampilan\ruangan;
use App\Models\Tampilan\beli_obat;
use App\Models\Tampilan\bayar;
use App\Models\Tampilan\pasien;
use App\Models\Tampilan\laporan;


class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->login = new admin_login();
    }


    public function index()
    {
        echo view('Templates/header_admin');
        echo view('admin/login_admin');
        echo view('Templates/footer_admin');
    }

    public function cek_login()
    {

        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $model = new admin_login();
            $user = $model->where(['username' => $username, 'password' => $password])->first();

            if (empty($user)) {
                $data['info'] = "Username atau Password salah !!!";
            } else {
                $this->setSession($user);
                return redirect()->to(base_url('/admin/dashboard_admin'));
            }
        } else {
        }
        echo view('Templates/header_admin');
        echo view('admin/login_admin');
        echo view('Templates/footer_admin');
    }

    public function setSession($user)
    {
        $data = [
            'nama' => $user['nama'],
            'level' => $user['level'],
            'loggedIn' => true
        ];

        session()->set($data);
    }

    public function dashboard()
    {
        $data = [];

        echo view('Templates/header_admin', $data);
        echo view('/admin/dashboard_admin');
        echo view('Templates/footer_admin');
    }

    public function dokter()
    {
        $model = new listDokter();
        $keyword = $this->request->getVar('cari');
        if ($keyword) {
            $daftar = $model->cari($keyword);
        } else {
            $daftar = $model;
        }

        $currentPage = $this->request->getVar('page_dokter') ? $this->request->getVar('page_dokter') : 1;
        $data = [
            'judul' => 'List Dokter',
            'Data' => $model->paginate(2, 'dokter'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/dokter', $data);
        echo view('Templates/footer_admin');
    }

    public function ruang()
    {
        $model = new ruangan();
        $keyword = $this->request->getVar('cari');
        if ($keyword) {
            $daftar = $model->cari($keyword);
        } else {
            $daftar = $model;
        }

        $currentPage = $this->request->getVar('page_ruang') ? $this->request->getVar('page_ruang') : 1;
        $data = [
            'judul' => 'List Ruangan',
            'Data' => $model->paginate(2, 'ruang'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/ruang', $data);
        echo view('Templates/footer_admin');
    }

    public function pendaftar()
    {
        $model = new daftar();
        $keyword = $this->request->getVar('cari');
        if ($keyword) {
            $model->cari($keyword);
        } else {
            $model;
        }

        $data = [
            'judul' => 'Daftar Pendaftar',
            'Data' => $model->getAllData(),
            'pager' => $model->pager,

        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/pendaftar');
        echo view('Templates/footer_admin');
    }

    public function pembelian_obat()
    {
        $model = new beli_obat();
        $keyword = $this->request->getVar('cari');
        if ($keyword) {
            $model->cari($keyword);
        } else {
            $model;
        }

        $data = [
            'judul' => 'Daftar Pembelian Obat',
            'Data' => $model->getAllData(),
            'pager' => $model->pager,

        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/pembelian_obat');
        echo view('Templates/footer_admin');
    }

    public function pasien_list()
    {
        $model = new pasien();
        $keyword = $this->request->getVar('cari');
        if ($keyword) {
            $model->cari($keyword);
        } else {
            $model;
        }

        $data = [
            'judul' => 'Daftar Pasien',
            'Data' => $model->getAllData(),
            'pager' => $model->pager,

        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/daftar_pasien_admin');
        echo view('Templates/footer_admin');
    }

    public function laporan_pengunjung()
    {
        $model = new laporan();
        $keyword = $this->request->getVar('cari');
        if ($keyword) {
            $model->cari($keyword);
        } else {
            $model;
        }

        $data = [
            'judul' => 'Daftar Pembayaran',
            'Data' => $model->getAllData(),
            'pager' => $model->pager,

        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/laporan_pengunjung');
        echo view('Templates/footer_admin');
    }

    public function pembayaran()
    {
        $model = new bayar();
        $keyword = $this->request->getVar('cari');
        if ($keyword) {
            $model->cari($keyword);
        } else {
            $model;
        }

        $data = [
            'judul' => 'Daftar Pembayaran',
            'Data' => $model->getAllData(),
            'pager' => $model->pager,

        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/pembayaran');
        echo view('Templates/footer_admin');
    }


    public function obat_admin()
    {
        $model = new Berobat();
        $keyword = $this->request->getVar('cari');
        if ($keyword) {
            $daftar = $model->cari($keyword);
        } else {
            $daftar = $model;
        }

        $currentPage = $this->request->getVar('page_obat') ? $this->request->getVar('page_obat') : 1;
        $data = [
            'judul' => 'Daftar Obat',
            'Data' => $model->paginate(2, 'obat'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/obat_admin');
        echo view('Templates/footer_admin');
    }



    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function tambah_dokter()
    {
        $data = [

            'nama_dokter' => $this->request->getPost('nama_dokter'),
            'rumah_sakit' => $this->request->getPost('rumah_sakit'),
            'spesialis' => $this->request->getPost('spesialis'),
            'jadwal_hari' => $this->request->getPost('jadwal_hari'),
            'jadwal_waktu' => $this->request->getPost('jadwal_waktu'),
            'jenis_klinik' => $this->request->getPost('jenis_klinik'),
        ];

        $model = new listDokter();

        $simpan = $model->tambah($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function nambah_laporan()
    {
        $model = new laporan();
        $model2 = new bayar();
        $model3 = new admin_login();

        $data = [
            'judul' => 'Tambah Laporan',
            'Data' => $model->getAllData(),
            'bayar' => $model2->getAllData(),
            'admin' => $model3->getAllData(),
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/data/tambah_laporan');
        echo view('Templates/footer_admin');
    }

    public function nambah()
    {
        $model = new listDokter();

        $data = [
            'judul' => 'Tambah Dokter'
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/data/tambah_dokter');
        echo view('Templates/footer_admin');
    }

    public function nambah_pasien()
    {
        $model2 = new UserModel();
        $model = new daftar();
        $model3 = new ruangan();
        $model4 = new listDokter();
        $model5 = new Berobat();

        $data = [
            'judul' => 'Tambah Dokter',
            'dokter' => $model4->getAllData(),
            'obat' => $model5->getAllData(),
            'user' => $model2->getAllData(),
            'ruang' => $model3->getAllData(),
            'spesialis' => $model->getAllData()
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/data/tambah_pasien');
        echo view('Templates/footer_admin');
    }

    public function nambah_pembayaran()
    {
        $model = new pasien();
        $model2 = new UserModel();

        session();

        $data = [
            'judul' => 'Tambah Pembayaran',
            'validation' => \Config\Services::validation(),
            'user' => $model2->getAllData(),
            'pasien' => $model->getAllData()
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/data/tambah_pembayaran');
        echo view('Templates/footer_admin');
    }

    public function nambah_ruang()
    {
        $model = new ruangan();

        $data = [
            'judul' => 'Tambah Ruang'
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/data/tambah_ruang');
        echo view('Templates/footer_admin');
    }

    public function tambah_beli()
    {
        $model2 = new Berobat();
        $model = new pasien();
        $model3 = new bayar();
        $model4 = new UserModel();

        session();

        $data = [
            'judul' => 'Tambah Pembelian Obat',
            'validation' => \Config\Services::validation(),
            'user' => $model2->getAllData(),
            'pengguna' => $model4->getAllData(),
            'pasien' => $model->getAllData(),
            'bayar' => $model3->getAllData(),
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/data/tambah_beli');
        echo view('Templates/footer_admin');
    }

    public function nambah_obat()
    {
        $model = new Berobat();

        $data = [
            'judul' => 'Tambah Obat'
        ];

        echo view('Templates/header_admin', $data);
        echo view('admin/data/tambah_obat');
        echo view('Templates/footer_admin');
    }

    public function tambah_ruang()
    {
        $data = [

            'nama_ruang' => $this->request->getPost('nama_ruang'),
            'kapasitas' => $this->request->getPost('kapasitas'),
        ];

        $model = new ruangan();

        $simpan = $model->tambah($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function tambah_laporan_pengunjung()
    {
        $data = [

            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'id_admin' => $this->request->getPost('id_admin'),
            'tanggal_bergabung' => $this->request->getPost('tanggal_bergabung'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'total_transaksi' => $this->request->getPost('total_transaksi'),
        ];

        $model = new laporan();

        $simpan = $model->tambah($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function tambah_pasien()
    {
        $data = [

            'id' => $this->request->getPost('id'),
            'jadwal_periksa' => $this->request->getPost('jadwal_periksa'),
            'id_dokter' => $this->request->getPost('id_dokter'),
            'id_ruang' => $this->request->getPost('id_ruang'),
            'id_daftar' => $this->request->getPost('id_daftar'),
            'id_obat' => $this->request->getPost('id_obat'),
        ];

        $model = new pasien();

        $simpan = $model->tambah($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function tambah_bayar()
    {
        if (!$this->validate([

            'bukti_bayar' => [

                'rules' => 'uploaded[bukti_bayar]|max_size[bukti_bayar,1024]|is_image[bukti_bayar]|mime_in[bukti_bayar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar dulu',
                    'max_size' => 'Gambar terlalu besar',
                    'is_image' => 'Yang di pilih bukan gambar',
                    'mime_in' => 'Yang di pilih bukan gambar',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/Admin/nambah_pembayaran'))->withInput()->with('validation', $validation);
        }

        //ambil gambar
        $file = $this->request->getFile('bukti_bayar');

        //pindahkan file
        $file->move('IMG');

        $nama = $file->getName();

        $data = [

            'id' => $this->request->getPost('id'),
            'id_pasien' => $this->request->getPost('id_pasien'),
            'biaya_pembayaran' => $this->request->getPost('biaya_pembayaran'),
            'nama_kasir' => $this->request->getPost('nama_kasir'),
            'bukti_bayar' => $nama,
            'ket' => $this->request->getPost('ket'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];

        $model = new bayar();

        $simpan = $model->tambah($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function tambah_obat()
    {
        $data = [

            'nama_obat' => $this->request->getPost('nama_obat'),
            'stok' => $this->request->getPost('stok'),
            'tanggal_kadaluarsa' => $this->request->getPost('tanggal_kadaluarsa'),
            'perusahaan' => $this->request->getPost('perusahaan'),
        ];

        $model = new Berobat();

        $simpan = $model->tambah($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function tambah_beli_obat()
    {
        if (!$this->validate([

            'jumlah_beli' => [

                'rules' => 'less_than[500]',
                'errors' => [
                    'less_than' => 'Jangan membeli lebih dari stok'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/Admin/tambah_beli'))->withInput()->with('validation', $validation);
        }

        //ambil gambar
        $file = $this->request->getFile('bukti_bayaran');

        //pindahkan file
        $file->move('IMG');

        $nama = $file->getName();

        $data = [

            'id' => $this->request->getPost('id'),
            'id_pasien' => $this->request->getPost('id_pasien'),
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'id_obat' => $this->request->getPost('id_obat'),
            'jumlah_beli' => $this->request->getPost('jumlah_beli'),
            'jumlah_bayar' => $this->request->getPost('jumlah_beli') * 100,
            'bukti_bayaran' =>  $nama,
        ];

        $model = new beli_obat();

        $simpan = $model->tambah($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function edit_pasien($id)
    {
        $model = new pasien();
        $pasien = $model->Data($id);

        $model2 = new UserModel();
        $model4 = new daftar();
        $model3 = new ruangan();
        $model5 = new listDokter();
        $model6 = new Berobat();


        $data = [
            'judul' => 'Edit Pasien',
            'pasien' => $pasien,
            'dokter' => $model5->getAllData(),
            'obat' => $model6->getAllData(),
            'user' => $model2->getAllData(),
            'ruang' => $model3->getAllData(),
            'spesialis' => $model4->getAllData()

        ];

        echo view('Templates/header_admin');
        echo view('admin/data/edit_data_pasien', $data);
        echo view('Templates/footer_admin');
    }

    public function edit_membeli($id)
    {

        $model2 = new Berobat();
        $model = new pasien();
        $model5 = new beli_obat();
        $beli = $model5->Data($id);
        $model3 = new bayar();
        $model4 = new UserModel();

        session();


        $data = [
            'judul' => 'Edit Pembelian Obat',
            'validation' => \Config\Services::validation(),
            'user' => $model2->getAllData(),
            'pengguna' => $model4->getAllData(),
            'pasien' => $model->getAllData(),
            'bayar' => $model3->getAllData(),
            'membeli' => $beli,

        ];

        echo view('Templates/header_admin');
        echo view('admin/data/edit_data_pembelian', $data);
        echo view('Templates/footer_admin');
    }

    public function edit_beli()
    {

        $file = $this->request->getFile('bukti_bayaran');

        //cek gambar berubah atau tidak

        if ($file->GetError() == 4) {
            $nama = $this->request->getVar('bukti_old');
        } else {

            $nama = $file->getName();

            $file->move('IMG', $nama);
        }

        $model = new beli_obat();

        $data = [
            'id' => $this->request->getPost('id'),
            'id_pasien' => $this->request->getPost('id_pasien'),
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'id_obat' => $this->request->getPost('id_obat'),
            'jumlah_beli' => $this->request->getPost('jumlah_beli'),
            'jumlah_bayar' => $this->request->getPost('jumlah_beli') * 100,
            'bukti_bayaran' =>  $nama,
        ];

        $ubah = $model->update_pembelian($data, $_POST['id_pembelian']);
        if ($ubah) {
            session()->setFlashdata('pesan', 'Data Berhasil Di ubah.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function delete_pembelian($id)
    {
        $model = new beli_obat();
        $model->delete($id);
        if ($model) {
            session()->setFlashdata('pesan', 'Data Berhasil Di hapus.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function edit_membayar($id)
    {
        $model = new bayar();
        $bayar = $model->Data($id);

        $model2 = new UserModel();
        session();

        $data = [
            'judul' => 'Edit pembayaran',
            'validation' => \Config\Services::validation(),
            'pembayaran' => $bayar,
            'user' => $model2->getAllData(),

        ];

        echo view('Templates/header_admin');
        echo view('admin/data/edit_membayar', $data);
        echo view('Templates/footer_admin');
    }


    public function edit_data_membayar()
    {

        $file = $this->request->getFile('bukti_bayar');

        //cek gambar berubah atau tidak

        if ($file->GetError() == 4) {
            $nama = $this->request->getVar('bukti_old');
        } else {

            $nama = $file->getName();

            $file->move('IMG', $nama);
        }

        $model = new bayar();

        $data = [
            'id' => $this->request->getPost('id'),
            'biaya_pembayaran' => $this->request->getPost('biaya_pembayaran'),
            'nama_kasir' => $this->request->getPost('nama_kasir'),
            'bukti_bayar' => $nama,
            'ket' => $this->request->getPost('ket'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];

        $ubah = $model->update_pembayaran($data, $_POST['id_transaksi']);
        if ($ubah) {
            session()->setFlashdata('pesan', 'Data Berhasil Di ubah.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function delete_pembayaran($id)
    {
        $model = new bayar();
        $model->delete($id);
        if ($model) {
            session()->setFlashdata('pesan', 'Data Berhasil Di hapus.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function edit_data_pasien()
    {
        $model = new pasien();

        $data = [
            'id' => $this->request->getPost('id'),
            'jadwal_periksa' => $this->request->getPost('jadwal_periksa'),
            'id_dokter' => $this->request->getPost('id_dokter'),
            'id_ruang' => $this->request->getPost('id_ruang'),
            'id_daftar' => $this->request->getPost('id_daftar'),
            'id_obat' => $this->request->getPost('id_obat'),
        ];

        $ubah = $model->update_pasien($data, $_POST['id_pasien']);
        if ($ubah) {
            session()->setFlashdata('pesan', 'Data Berhasil Di ubah.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function delete_pasien($id)
    {
        $model = new pasien();
        $model->delete($id);
        if ($model) {
            session()->setFlashdata('pesan', 'Data Berhasil Di hapus.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function edit_laporan($id)
    {
        $model = new laporan();
        $laporan = $model->Data($id);

        $data = [
            'judul' => 'Edit Ruang',
            'laporan' => $laporan

        ];

        echo view('Templates/header_admin');
        echo view('admin/data/edit_laporan', $data);
        echo view('Templates/footer_admin');
    }

    public function edit_lapor()
    {
        $model = new laporan();
        $data = [
            'tanggal_bergabung' => $this->request->getVar('tanggal_bergabung'),
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'total_transaksi' => $this->request->getVar('total_transaksi'),
        ];

        $ubah = $model->update_laporan_pengunjung($data, $_POST['id_laporan']);
        if ($ubah) {
            session()->setFlashdata('pesan', 'Data Berhasil Di ubah.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function delete_laporan($id)
    {
        $model = new laporan();
        $model->delete($id);
        if ($model) {
            session()->setFlashdata('pesan', 'Data Berhasil Di hapus.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function edit_ruang($id)
    {
        $model = new ruangan();
        $ruang = $model->Data($id);

        $data = [
            'judul' => 'Edit Ruang',
            'ruang' => $ruang

        ];

        echo view('Templates/header_admin');
        echo view('admin/data/edit_data_ruang', $data);
        echo view('Templates/footer_admin');
    }

    public function edit_ruangan()
    {
        $model = new ruangan();
        $data = [
            'nama_ruang' => $this->request->getVar('nama_ruang'),
            'kapasitas' => $this->request->getVar('kapasitas'),
        ];

        $ubah = $model->update_ruang($data, $_POST['id_ruang']);
        if ($ubah) {
            session()->setFlashdata('pesan', 'Data Berhasil Di ubah.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function delete_ruang($id)
    {
        $model = new ruangan();
        $model->delete($id);
        if ($model) {
            session()->setFlashdata('pesan', 'Data Berhasil Di hapus.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function edit($id)
    {
        $model = new listDokter();
        $dokter = $model->Data($id);

        $data = [
            'judul' => 'Edit Dokter',
            'dokter' => $dokter

        ];

        echo view('Templates/header_admin');
        echo view('admin/data/edit_data_dokter', $data);
        echo view('Templates/footer_admin');
    }

    public function delete($id)
    {
        $model = new listDokter();
        $model->delete($id);
        if ($model) {
            session()->setFlashdata('pesan', 'Data Berhasil Di hapus.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }


    public function edit_dokter()
    {
        $model = new listDokter();
        $data = [
            'nama_dokter' => $this->request->getVar('nama_dokter'),
            'rumah_sakit' => $this->request->getVar('rumah_sakit'),
            'spesialis' => $this->request->getVar('spesialis'),
            'jadwal_hari' => $this->request->getVar('jadwal_hari'),
            'jadwal_waktu' => $this->request->getVar('jadwal_waktu'),
            'jenis_klinik' => $this->request->getVar('jenis_klinik'),
        ];

        $ubah = $model->update_dokter($data, $_POST['id_dokter']);
        if ($ubah) {
            session()->setFlashdata('pesan', 'Data Berhasil Di ubah.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function edit_pendaftaran($id)
    {
        $model = new daftar();
        $model2 = new listDokter();
        $Data = $model->Data($id);

        $data = [
            'judul' => 'Edit Dokter',
            'Data' => $Data,
            'spesialis' => $model2->getData()

        ];

        echo view('Templates/header_admin');
        echo view('admin/data/edit_pendaftaran', $data);
        echo view('Templates/footer_admin');
    }

    public function edit_daftar()
    {
        $model = new daftar();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'sakit' => $this->request->getPost('sakit'),
            'id_dokter' => $this->request->getPost('id_dokter'),
        ];

        $ubah = $model->update_pendaftaran($data, $_POST['id_daftar']);
        if ($ubah) {
            session()->setFlashdata('pesan', 'Data Berhasil Di ubah.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function delete_pendaftaran($id)
    {
        $model = new daftar();
        $model->delete($id);
        if ($model) {
            session()->setFlashdata('pesan', 'Data Berhasil Di hapus.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }
    public function edit_stok($id)
    {
        $model = new Berobat();
        $obat = $model->Data($id);

        $data = [
            'judul' => 'Edit Obat',
            'obat' => $obat

        ];

        echo view('Templates/header_admin');
        echo view('admin/data/edit_obat', $data);
        echo view('Templates/footer_admin');
    }

    public function edit_obat()
    {
        $model = new Berobat();
        $data = [
            'nama_obat' => $this->request->getVar('nama_obat'),
            'stok' => $this->request->getVar('stok'),
            'tanggal_kadaluarsa' => $this->request->getVar('tanggal_kadaluarsa'),
            'perusahaan' => $this->request->getVar('perusahaan'),
        ];

        $ubah = $model->update_obat($data, $_POST['id_obat']);
        if ($ubah) {
            session()->setFlashdata('pesan', 'Data Berhasil Di ubah.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }

    public function delete_obat($id)
    {

        $model = new Berobat();
        $model->delete($id);
        if ($model) {
            session()->setFlashdata('pesan', 'Data Berhasil Di hapus.');
            return redirect()->to(base_url('/admin/dashboard_admin'));
        }
    }
}
