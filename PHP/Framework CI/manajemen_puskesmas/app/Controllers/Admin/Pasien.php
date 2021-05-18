<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Users_M;
use App\Models\Dokter_M;
use App\Models\Pasien_M;
use App\Models\Pendaftaran_M;
use App\Models\Ruang_M;
use App\Models\Obat_M;

class Pasien extends BaseController
{
	public function read()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$pager = \Config\Services::pager();
		$model = new Pasien_M();
		//$dokter = $model -> findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pasien',
			//'spesialis' => $dokter,
			// 'pasien' => $model->paginate(3, 'page'),
			// 'pager' => $model->pager,
			'pasien_data' => $model->get_data(),
		];

		return view("Pasien/select_pasien", $data);
	}


	public function create()
	// Melakukan insert data atau menambahkan data
	{
		$model_u = new Users_M();
		$model_d = new Dokter_M();
		$model_r = new Ruang_M();
		$model_p = new Pendaftaran_M();
		$model_o = new Obat_M();

		$user = $model_u->findAll();
		$dokter = $model_d->findAll();
		$ruang = $model_r->findAll();
		$daftar = $model_p->findAll();
		$obat = $model_o->findAll();

		$data = [
			'user' => $user,
			'dokter' => $dokter,
			'ruang' => $ruang,
			'daftar' => $daftar,
			'obat' => $obat,
		];

		return view('Pasien/insert_pasien', $data);
	}

	public function insert()
	// Untuk melakukan update (Sebelum masuk ke form)
	{
		$request = \Config\Services::request();

		$data = [
			'id' => $request->getPost('id'),
			'jadwal_periksa' => $request->getPost('jadwal_periksa'),
			'id_dokter' => $request->getPost('id_dokter'),
			'id_ruang' => $request->getPost('id_ruang'),
			'id_daftar' => $request->getPost('id_daftar'),
			'id_obat' => $request->getPost('id_obat'),
		];

		$model = new Pasien_M();

		if ($model->insert($data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/pasien/create"));
		} else {
			return redirect()->to(base_url("/admin/pasien/read"));
		}
	}

	public function find($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		$model = new Pasien_M();
		$model_u = new Users_M();
		$model_d = new Dokter_M();
		$model_r = new Ruang_M();
		$model_p = new Pendaftaran_M();
		$model_o = new Obat_M();

		$pasien = $model->find($id);
		$user = $model_u->findAll();
		$dokter = $model_d->findAll();
		$ruang = $model_r->findAll();
		$pendaftar = $model_p->findAll();
		$obat = $model_o->findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'UPDATE DATA PASIEN',
			'pasien' => $pasien,
			'user' => $user,
			'dokter' => $dokter,
			'ruang' => $ruang,
			'pendaftar' => $pendaftar,
			'obat' => $obat,
		];

		return view("Pasien/update_pasien", $data);
	}

	public function update()
	//  Untuk menyimpan hasil dari update tadi
	{
		$id_pasien = $this->request->getPost('id_pasien');

		$data = [
			'id' => $this->request->getPost('id'),
			'jadwal_periksa' => $this->request->getPost('jadwal_periksa'),
			'id_dokter' => $this->request->getPost('id_dokter'),
			'id_ruang' => $this->request->getPost('id_ruang'),
			'id_daftar' => $this->request->getPost('id_daftar'),
			'id_obat' => $this->request->getPost('id_obat'),
		];

		$model = new Pasien_M();

		if ($model->update($id_pasien, $data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/pasien/find/$id_pasien"));
		} else {
			return redirect()->to(base_url("/admin/pasien/read"));
		}
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Pasien_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/pasien/read"));
	}
}
