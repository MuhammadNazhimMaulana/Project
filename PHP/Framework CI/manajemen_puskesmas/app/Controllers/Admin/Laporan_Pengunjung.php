<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Laporan_M;
use App\Models\Transaksi_M;
use App\Models\Admin_M;

class Laporan_Pengunjung extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo '<h1>Ini merupakan bagian Laporan Keuangan</h1>';
	}

	public function read()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$pager = \Config\Services::pager();
		$model = new Laporan_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Laporan Keuangan',
			//'spesialis' => $dokter,
			// 'laporan' => $model->paginate(3, 'page'),
			// 'pager' => $model->pager,
			'laporan_data' => $model->get_data(),
		];

		return view("Laporan_Pengunjung/select_laporan_pengunjung", $data);
	}

	public function create()
	// Untuk melakukan update (Sebelum masuk ke form)
	{
		$model_a = new Admin_M();
		$model_t = new Transaksi_M();


		$admin = $model_a->findAll();
		$transaksi = $model_t->findAll();

		$data = [
			'admin' => $admin,
			'transaksi' => $transaksi,
		];

		return view('Laporan_Pengunjung/insert_laporan_pengunjung', $data);
	}

	public function insert()
	// Melakukan insert data atau menambahkan data
	{
		$request = \Config\Services::request();

		$data = [
			'id_transaksi' => $request->getPost('id_transaksi'),
			'id_admin' => $request->getPost('id_admin'),
			'tanggal_bergabung' => $request->getPost('tanggal_bergabung'),
			'tanggal_keluar' => $request->getPost('tanggal_keluar'),
			'total_transaksi' => $request->getPost('total_transaksi'),
		];

		$model = new Laporan_M();

		if ($model->insert($data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/laporan_pengunjung/create"));
		} else {
			return redirect()->to(base_url("/admin/laporan_pengunjung/read"));
		}
	}


	public function find($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		$model = new Laporan_M();
		$model_a = new Admin_M();
		$model_t = new Transaksi_M();

		$laporan = $model->find($id);
		$admin = $model_a->findAll();
		$transaksi = $model_t->findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'UPDATE DATA LAPORAN PENGUNJUNG',
			'laporan' => $laporan,
			'admin' => $admin,
			'transaksi' => $transaksi,
		];

		return view("Laporan_Pengunjung/update_laporan_pengunjung", $data);
	}
	public function update()
	//  Untuk menyimpan hasil dari update tadi
	{
		$id_laporan = $this->request->getPost('id_laporan');

		$data = [
			'id_transaksi' => $this->request->getPost('id_transaksi'),
			'id_admin' => $this->request->getPost('id_admin'),
			'tanggal_bergabung' => $this->request->getPost('tanggal_bergabung'),
			'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
			'total_transaksi' => $this->request->getPost('total_transaksi'),
		];

		$model = new Laporan_M();

		if ($model->update($id_laporan, $data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/laporan_pengunjung/find/$id_laporan"));
		} else {
			return redirect()->to(base_url("/admin/laporan_pengunjung/read"));
		}
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Laporan_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/laporan_pengunjung/read"));
	}
}
