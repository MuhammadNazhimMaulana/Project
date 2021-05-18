<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pembelian_Obat_M;
use App\Models\Users_M;
use App\Models\Pasien_M;
use App\Models\Transaksi_M;
use App\Models\Obat_M;

class Pembelian_Obat extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo '<h1>Ini merupakan bagian Beli Obat</h1>';
	}

	public function read()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$pager = \Config\Services::pager();
		$model = new Pembelian_Obat_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pembelian Obat',
			//'spesialis' => $dokter,
			// 'pembeli_obat' => $model->paginate(3, 'page'),
			// 'pager' => $model->pager,
			'pembeli_obat_data' => $model->get_data(),
		];

		return view("Pembelian_Obat/select_pembelian_obat", $data);
	}

	public function create()
	// Untuk melakukan update (Sebelum masuk ke form)
	{
		$model = new Users_M();
		$model_p = new Pasien_M();
		$model_t = new Transaksi_M();
		$model_o = new Obat_M();

		$user = $model->findAll();
		$pasien = $model_p->findAll();
		$transaksi = $model_t->findAll();
		$obat = $model_o->findAll();

		$data = [
			'user' => $user,
			'pasien' => $pasien,
			'transaksi' => $transaksi,
			'obat' => $obat,
		];

		return view('Pembelian_Obat/insert_pembelian_obat', $data);
	}


	public function insert()
	// Melakukan insert data atau menambahkan data
	{
		$request = \Config\Services::request();

		$file = $request->getFile('bukti_bayaran');

		$name = $file->getName();

		$data = [
			'id' => $request->getPost('id'),
			'id_pasien' => $request->getPost('id_pasien'),
			'id_transaksi' => $request->getPost('id_transaksi'),
			'id_obat' => $request->getPost('id_obat'),
			'jumlah_beli' => $request->getPost('jumlah_beli'),
			'jumlah_bayar' => $request->getPost('jumlah_beli') * 40,
			'bukti_bayaran' => $name,
		];


		$model = new Pembelian_Obat_M();

		if ($model->insert($data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/pembelian_obat/create"));
		} else {
			$file->move('./upload', $name);
			return redirect()->to(base_url("/admin/pembelian_obat/read"));
		}
	}


	public function find($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		$model = new Pembelian_Obat_M();
		$model_u = new Users_M();
		$model_p = new Pasien_M();
		$model_t = new Transaksi_M();
		$model_o = new Obat_M();

		$beli = $model->find($id);
		$user = $model_u->findAll();
		$pasien = $model_p->findAll();
		$trans = $model_t->findAll();
		$obat = $model_o->findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'UPDATE DATA TRANSAKSI',
			'beli' => $beli,
			'user' => $user,
			'pasien' => $pasien,
			'trans' => $trans,
			'obat' => $obat,
		];

		return view("Pembelian_obat/update_pembelian_obat", $data);
	}

	public function update()
	//  Untuk menyimpan hasil dari update tadi
	{
		$id_pembelian = $this->request->getPost('id_pembelian');
		$file = $this->request->getFile('bukti_bayaran');
		$name = $file->getName();

		if (empty($name)) {
			$name = $this->request->getPost('bukti_bayaran');
		} else {
			$file->move('./upload', $name);
		}

		$data = [
			'id' => $this->request->getPost('id'),
			'id_pasien' => $this->request->getPost('id_pasien'),
			'id_transaksi' => $this->request->getPost('id_transaksi'),
			'id_obat' => $this->request->getPost('id_obat'),
			'jumlah_beli' => $this->request->getPost('jumlah_beli'),
			'jumlah_bayar' => $this->request->getPost('jumlah_beli') * 40,
			'bukti_bayaran' => $name,
		];

		$model = new Pembelian_Obat_M();

		if ($model->update($id_pembelian, $data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/pembelian_obat/find/$id_pembelian"));
		} else {
			return redirect()->to(base_url("/admin/pembelian_obat/read"));
		}
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Pembelian_Obat_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/pembelian_obat/read"));
	}
}
