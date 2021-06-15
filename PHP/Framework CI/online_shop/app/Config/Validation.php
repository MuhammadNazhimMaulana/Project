<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $register = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'password' => [
			'rules' => 'required',
		],
		'password_confirm' => [
			'rules' => 'required|matches[password]',
		]
	];

	public $register_errors = [
		'username' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 5 karakter,'
		],
		'password' => [
			'required' => '{field} Harus diisi',
		],
		'password_confirm' => [
			'required' => '{field} Harus diisi',
			'matches' => '{field} Tidak sama dengan Password',
		]
	];

	public $login = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $login_errors = [
		'username' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 5 karakter,'
		],
		'password' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $barang = [
		'nama_barang' => [
			'rules' => 'required|min_length[3]',
		],
		'harga' => [
			'rules' => 'required|is_natural',
		],
		'stok' => [
			'rules' => 'required|is_natural',
		],
		'gambar' => [
			'rules' => 'uploaded[gambar]',
		],
	];

	public $barang_errors = [
		'nama_barang' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'harga' => [
			'required' => '{field} Harus diisi',
			'is_natural' => '{field} Tidak boleh negatif'
		],
		'stok' => [
			'required' => '{field} Harus diisi',
			'is_natural' => '{field} Tidak boleh negatif'
		],
		'gambar' => [
			'uploaded' => '{field} Harus di upload',
		],
	];

	public $barang_update = [
		'nama_barang' => [
			'rules' => 'required|min_length[3]',
		],
		'harga' => [
			'rules' => 'required|is_natural',
		],
		'stok' => [
			'rules' => 'required|is_natural',
		],
	];

	public $barang_update_errors = [
		'nama_barang' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'harga' => [
			'required' => '{field} Harus diisi',
			'is_natural' => '{field} Tidak boleh negatif'
		],
		'stok' => [
			'required' => '{field} Harus diisi',
			'is_natural' => '{field} Tidak boleh negatif'
		],
	];

	public $transaksi = [
		'id_user' => [
			'rules' => 'required',
		],
		'id_barang' => [
			'rules' => 'required',
		],
		'jumlah' => [
			'rules' => 'required',
		],
		'total_harga' => [
			'rules' => 'required',
		],
		'alamat' => [
			'rules' => 'required',
		],
		'ongkir' => [
			'rules' => 'required',
		],
	];

	public $transaksi_errors = [
		'id_user' => [
			'required' => '{field} Harus diisi',
		],
		'id_barang' => [
			'required' => '{field} Harus diisi',
		],
		'jumlah' => [
			'required' => '{field} Harus diisi',
		],
		'total_harga' => [
			'required' => '{field} Harus diisi',
		],
		'alamat' => [
			'required' => '{field} Harus diisi',
		],
		'ongkir' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $komentar = [
		'komentar' => [
			'rules' => 'required',
		],
	];

	public $komentar_error = [
		'komentar' => [
			'required' => '{field} Harus diisi',
		],
	];
}
