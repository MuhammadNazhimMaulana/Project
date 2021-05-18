<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <?= view_cell('\App\Controllers\Admin\Transaksi::option') ?>
</div>

<div class="row">
    <h1>Upload Image</h1>

    <form action="<?= base_url('/admin/transaksi/insert') ?>" method="POST" enctype="multipart/form-data">
        ID : <input type="number" name="id">
        <br>
        ID Pasien : <input type="number" name="id_pasien">
        <br>
        Biaya : <input type="number" name="biaya_pembayaran">
        <br>
        Kasir : <input type="text" name="nama_kasir">
        <br>
        Bukti : <input type="file" name="bukti_bayar" required>
        <br>
        Keterangan : <input type="text" name="ket">
        <br>
        Tanggal : <input type="date" name="tanggal">
        <br>
        <input type="submit" name="simpan" value="simpan">
</div>

</form>

<?= $this->endSection() ?>