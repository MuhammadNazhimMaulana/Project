<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\Barang_Model;
use App\Models\Komentar_Model;
use App\Models\Transaksi_Model;
use App\Entities\Barang;
use App\Entities\Transaksi;

class Etalase_C extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "33c1c2e65f5dd31aaf39295c540aa23d";

    public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

        // Load Session
        $this->session = session();
    }

    // Index untuk melihat seluruh data
    public function index()
    {
        $barang = new Barang_Model();

        $model = $barang->findAll();

        $data = [
            'model' => $model
        ];

        return view('Etalase/index_etalase', $data);
    }

    public function beli()
    {
        $id_barang = $this->request->uri->getSegment(4);

        $model_b = new Barang_Model();

        $komentar_model = new Komentar_Model();

        $komentar = $komentar_model->where('id_barang', $id_barang)->findAll();

        $belanjaan = $model_b->find($id_barang);

        $provinsi = $this->api_rajaongkir('province');

        $data_beli = [
            'belanjaan' => $belanjaan,
            'komentar' => $komentar,
            'provinsi' => json_decode($provinsi)->rajaongkir->results,
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksi');
            $errors = $this->validation->getErrors();
            if (!$errors) {
                $model = new Transaksi_Model();

                $transaksi = new Transaksi();

                $barang = new Barang_Model();
                $id_barang = $this->request->getPost('id_barang');
                $jumlah = $this->request->getPost('jumlah');
                $barang_data = $barang->find($id_barang);

                $entitas_barang = new Barang();
                $entitas_barang->id_barang = $id_barang;
                $entitas_barang->stok = $barang_data->stok - $jumlah;
                $barang->save($entitas_barang);

                $transaksi->fill($data);
                $transaksi->status = 0;
                $transaksi->created_by = $this->session->get('id_user');
                $transaksi->created_date = date("Y-m-d H:i:s");

                $model->save($transaksi);

                $id_transaksi = $model->insertID();

                $segment = ['Transaksi_C', 'view', $id_transaksi];

                return redirect()->to(site_url($segment));
            }
        }

        return view('Etalase/beli_barang', $data_beli);
    }

    // AJAX
    public function getCity()
    {
        if ($this->request->isAJAX()) {
            $id_province = $this->request->getGet('id_province');
            $data = $this->api_rajaongkir('city', $id_province);
            return $this->response->setJSON($data);
        }
    }

    // Untuk API nya (Get)
    private function api_rajaongkir($method, $id_province = null)
    {
        $endPoint = $this->url . $method;

        if ($id_province != null) {
            $endPoint = $endPoint . "?province=" . $id_province;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }

    public function getCost()
    {
        if ($this->request->isAjax()) {
            $origin = $this->request->getGet('origin');
            $destination = $this->request->getGet('destination');
            $weight = $this->request->getGet('weight');
            $courier = $this->request->getGet('courier');
            $data = $this->rajaongkir_cost($origin, $destination, $weight, $courier);

            return $this->response->setJSON($data);
        }
    }

    // API POST
    private function rajaongkir_cost($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:" . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }
}
