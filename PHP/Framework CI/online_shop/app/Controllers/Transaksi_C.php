<?php

namespace App\Controllers;

use TCPDF;
use App\Models\Transaksi_Model;
use App\Models\User_Model;
use App\Models\Barang_Model;
use App\Entities\Transaksi;

class Transaksi_C extends BaseController
{
    public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

        // Load Session
        $this->session = session();

        // Servis email
        $this->email = \Config\Services::email();
    }


    // View digunakan untuk melihat data lebih detail (satu saja)
    public function view()
    {
        $id_transaksi = $this->request->uri->getSegment(3);

        $model = new Transaksi_Model();

        // Join table
        $transaksi = $model->join('tbl_barang', 'tbl_barang.id_barang = tbl_transaksi.id_barang')->join('tbl_user', 'tbl_user.id_user = tbl_transaksi.id_user')->where('tbl_transaksi.id_transaksi', $id_transaksi)->first();

        $data = [
            'transaksi' => $transaksi
        ];

        return view('Transaksi/view_transaksi', $data);
    }

    public function index()
    {
        $model = new Transaksi_Model();

        $model_transaksi = $model->findAll();

        $data = [
            'model' => $model_transaksi,
        ];

        return view('Transaksi/index_transaksi', $data);
    }

    public function invoice()
    {
        $id_transaksi = $this->request->uri->getSegment(3);

        // Ambil Data Transaksi
        $model = new Transaksi_Model();
        $transaksi = $model->find($id_transaksi);

        // Ambil Data User
        $model_user = new User_Model();
        $user = $model_user->find($transaksi->id_user);

        // Ambil Data Barang
        $model_barang = new Barang_Model();
        $barang = $model_barang->find($transaksi->id_barang);

        $data = [
            'transaksi' => $transaksi,
            'user' => $user,
            'barang' => $barang,
        ];

        // View di simpan ke dalam variabel html
        $html =  view('Transaksi/invoice_transaksi', $data);

        // Skrip menggunakan TCPDF
        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Muhammad Nazhim Maulana');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        // Menghilangkan garis header dan footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // Output HTML
        $pdf->writeHTML($html, true, false, true, false, '');

        // Penting agar browser menampilkan pdf
        // $this->response->setContentType('application/pdf');

        // Membuat dokumen pdf (F untuk write file di folder yang dipilih)
        // $pdf->Output('Invoice.pdf', 'I'); (Ini untuk menampilkan di browser langsung)

        $pdf->Output(__DIR__ . '/../../public/uploads/Invoice.pdf', 'F');

        $attachment = base_url('uploads/Invoice.pdf');

        $message = "<h1>Invoice Pembelian</h1><p>Kepada " . $user->username . " Berikut Invoice atas pembelian barang " . $barang->nama_barang . " ";

        $this->send_Email($attachment, 'penerima@gmail.com', 'Invoice', $message);

        return redirect()->to(site_url('Transaksi_C/index'));
    }

    // Function mengirim email

    private function send_Email($attachment, $to, $title, $message)
    {
        $this->email->setFrom('pengirim@gmail.com', 'Nama Pengirim');
        $this->email->setTo($to);

        $this->email->attach($attachment);

        $this->email->setSubject($title);

        $this->email->setMessage($message);

        // Send email
        if (!$this->email->send()) {
            return false;
        } else {
            return true;
        }
    }
}
