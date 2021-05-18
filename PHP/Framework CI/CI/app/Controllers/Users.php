<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Tampilan\listDokter;
use App\Models\Tampilan\daftar;
use App\Models\Tampilan\Berobat;
use App\Models\Tampilan\pasien;
use App\Models\Tampilan\beli_obat;
use App\Models\Tampilan\bayar;
use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //Here is the validation (Validasinya)
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'E-mail or password do not match'
                ]
            ];
            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                $this->setUserSession($user);
                //$session->setFlashData('success', 'successful Registration');
                return redirect()->to(base_url('dashboard'));
            }
        }

        echo view('Templates/header', $data);
        echo view('login');
        echo view('Templates/footer');
    }

    public function lupa_password()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //Here is the validation (Validasinya)
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'E-mail or password do not match'
                ]
            ];
            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                $this->setUserSession($user);
                //$session->setFlashData('success', 'successful Registration');
                return redirect()->to(base_url('profile_lupa'));
            }
        }

        echo view('Templates/header', $data);
        echo view('lupa_password');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //Here is the validation (Validasinya)
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //store data user in database
                $model = new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'ktp' => $this->request->getVar('ktp'),
                    'alamat' => $this->request->getVar('alamat'),
                    'kota' => $this->request->getVar('kota'),
                    'provinsi' => $this->request->getVar('provinsi'),
                    'kode_pos' => $this->request->getVar('kode_pos'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashData('success', 'successful Registration');
                return redirect()->to(base_url('/'));
            }
        }

        echo view('Templates/header', $data);
        echo view('Register', $data);
        echo view('Templates/footer', $data);
    }

    public function profile_lupa()
    {
        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'post') {
            //Here is the validation (Validasinya)

            if ($this->request->getPost('password') != '') {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //store data user in database
                $newData = [
                    'id' => session()->get('id'),
                ];
                if ($this->request->getPost('password') != '') {
                    $newData['password'] = $this->request->getPost('password');
                }

                $model->save($newData);

                session()->setFlashData('success', 'Berhasil Ubah Password');
                return redirect()->to(base_url('/'));
            }
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('Templates/header_lupa', $data);
        echo view('profile_lupa');
    }

    public function profile()
    {
        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'post') {
            //Here is the validation (Validasinya)
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
            ];

            if ($this->request->getPost('password') != '') {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //store data user in database


                $newData = [
                    'id' => session()->get('id'),
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'alamat' => $this->request->getPost('alamat'),
                ];
                if ($this->request->getPost('password') != '') {
                    $newData['password'] = $this->request->getPost('password');
                }

                $model->save($newData);

                session()->setFlashData('success', 'Berhasil di Update');
                return redirect()->to(base_url('/profile'));
            }
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('Templates/header', $data);
        echo view('profile');
        echo view('Templates/footer');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function docter()
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
            'dokter' => $model->paginate(2, 'dokter'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
        ];

        echo view('Templates/header', $data);
        echo view('kategori/docter');
        echo view('Templates/footer');
    }

    public function jadwal()
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

        echo view('Templates/header', $data);
        echo view('kategori/jadwal');
        echo view('Templates/footer');
    }

    public function pendaftaran()
    {
        $model = new listDokter();

        $data = [
            'judul' => 'Pendaftaran',
            'spesialis' => $model->getData()
        ];
        echo view('Templates/header', $data);
        echo view('kategori/pendaftaran');
        echo view('Templates/footer');
    }

    public function beli_obat()
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

        echo view('Templates/header', $data);
        echo view('kategori/beli_obat');
        echo view('Templates/footer');
    }

    public function beli_berobat()
    {
        $model2 = new Berobat();
        $model = new pasien();
        $model3 = new bayar();

        session();

        $data = [
            'judul' => 'Tambah Pembelian Obat',
            'validation' => \Config\Services::validation(),
            'user' => $model2->getAllData(),
            'pasien' => $model->getAllData(),
            'bayar' => $model3->getAllData(),
        ];

        echo view('Templates/header', $data);
        echo view('kategori/beli_berobat');
        echo view('Templates/footer');
    }


    public function Membayar()
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

        echo view('Templates/header', $data);
        echo view('kategori/Membayar');
        echo view('Templates/footer');
    }

    public function tambah()
    {
        $data = [

            'nama' => $this->request->getVar('nama'),
            'sakit' => $this->request->getVar('sakit'),
            'id_dokter' => $this->request->getVar('id_dokter'),
            'kebutuhan' => $this->request->getVar('kebutuhan'),
        ];

        $model = new daftar();

        $simpan = $model->tambah($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('/dashboard'));
        }
    }

    public function daftar_obat()
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
            'judul' => 'List Obat',
            'obat' => $model->paginate(2, 'obat'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
        ];

        echo view('Templates/header');
        echo view('kategori/daftar_obat', $data);
        echo view('Templates/footer');
    }


    //--------------------------------------------------------------------

}
