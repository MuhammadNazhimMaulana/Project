<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>

<h1 class="mt-4">Transaksi Nomor <?= $transaksi->id_transaksi ?></h1>
<hr>

<table class="table">
    <tr>
        <td>Barang</td>
        <td><?= $transaksi->nama_barang ?></td>
    </tr>
    <tr>
        <td>Pembeli</td>
        <td><?= $transaksi->username ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?= $transaksi->alamat ?></td>
    </tr>
    <tr>
        <td>Jumlah Pembelian</td>
        <td><?= $transaksi->jumlah ?></td>
    </tr>
    <tr>
        <td>Total Harga</td>
        <td><?= $transaksi->total_harga ?></td>
    </tr>
</table>
<?= $this->endSection() ?>