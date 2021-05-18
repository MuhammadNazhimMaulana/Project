<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Users_M;
use App\Models\Transaksi_M;
use App\Models\Pasien_M;

class Transaksi extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		return view('Transaksi/form');
	}

	public function read()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$pager = \Config\Services::pager();
		$model = new Transaksi_M();
		//$dokter = $model -> findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Transaksi',
			//'spesialis' => $dokter,
			// 'trans' => $model->paginate(3, 'page'),
			// 'pager' => $model->pager,
			'trans_data' => $model->get_data(),
		];

		return view("Transaksi/select_transaksi", $data);
	}

	public function select()
	{
		$pager = \Config\Services::pager();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$model = new Transaksi_M();
			$jumlah = $model->where('id', $id)->findAll();
			$count = count($jumlah);
			$tampil = 3;
			$mulai = 0;

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$mulai = ($tampil * $page) - $tampil;
			}

			$transaksi = $model->where('id', $id)->findAll($tampil, $mulai);

			$data = [
				'judul' => 'Data Pencarian Transaksi',
				//'spesialis' => $dokter,
				'trans' => $transaksi,
				'pager' => $pager,
				'tampil' => $tampil,
				'total' => $count,
			];

			return view("Transaksi/search_based_user", $data);
		}
	}

	public function create()
	// Melakukan insert data atau menambahkan data
	{
		$model = new Users_M();
		$model_p = new pasien_M();

		$user = $model->findAll();
		$pasien = $model_p->findAll();
		$data = [
			'user' => $user,
			'pasien' => $pasien
		];

		return view('transaksi/insert_transaksi', $data);
	}

	public function insert()
	// Melakukan insert data atau menambahkan data
	{
		$request = \Config\Services::request();

		$file = $request->getFile('bukti_bayar');

		$name = $file->getName();

		$data = [
			'id' => $request->getPost('id'),
			'id_pasien' => $request->getPost('id_pasien'),
			'biaya_pembayaran' => $request->getPost('biaya_pembayaran'),
			'nama_kasir' => $request->getPost('nama_kasir'),
			'bukti_bayar' => $name,
			'ket' => $request->getPost('ket'),
			'tanggal' => $request->getPost('tanggal'),
		];

		$model = new Transaksi_M();

		if ($model->insert($data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/transaksi/create"));
		} else {
			$file->move('./upload', $name);
			return redirect()->to(base_url("/admin/transaksi/read"));
		}
	}

	public function find($id = null)
	// Untuk melakukan update (Sebelum masuk ke form)
	{
		$model_u = new Users_M();
		$model_p = new pasien_M();
		$model = new Transaksi_M();

		$trans = $model->find($id);
		$user = $model_u->findAll();
		$pasien = $model_p->findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'UPDATE DATA TRANSAKSI',
			'trans' => $trans,
			'user' => $user,
			'pasien' => $pasien,
		];

		return view("Transaksi/update_transaksi", $data);
	}

	public function update()
	//  Untuk menyimpan hasil dari update tadi
	{
		$id_transaksi = $this->request->getPost('id_transaksi');
		$file = $this->request->getFile('bukti_bayar');
		$name = $file->getName();

		if (empty($name)) {
			$name = $this->request->getPost('bukti_bayar');
		} else {
			$file->move('./upload', $name);
		}

		$data = [
			'id' => $this->request->getPost('id'),
			'id_pasien' => $this->request->getPost('id_pasien'),
			'biaya_pembayaran' => $this->request->getPost('biaya_pembayaran'),
			'nama_kasir' => $this->request->getPost('nama_kasir'),
			'bukti_bayar' => $name,
			'ket' => $this->request->getPost('ket'),
			'tanggal' => $this->request->getPost('tanggal'),
		];

		$model = new Transaksi_M();

		if ($model->update($id_transaksi, $data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/transaksi/find/$id_transaksi"));
		} else {
			return redirect()->to(base_url("/admin/transaksi/read"));
		}
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Transaksi_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/transaksi/read"));
	}

	public function option()
	{
		$model = new Users_M();
		$user = $model->findAll();
		$data = [
			'user' => $user
		];
		return view('template/option', $data);
	}
}
