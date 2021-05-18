<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php
if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}
?>


<div class="row mt-5">
    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/transaksi/create') ?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?php echo $judul ?></h3>
    </div>

</div>

<div class="row mt-3">
    <div class="col-6">
        <form action="<?= base_url('/admin/transaksi/select') ?>" method="get">
            <?= view_cell('\App\Controllers\Admin\Transaksi::option') ?>
        </form>
    </div>
</div>



<div class="row mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama Pasien</th>
            <th>Pasien</th>
            <th>Biaya</th>
            <th>Kasir</th>
            <th>Bukti</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php $no ?>
        <?php foreach ($trans_data as $key => $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['firstname'] ?></td>
                <td><?= $value['jadwal_periksa'] ?></td>
                <td><?= number_format($value['biaya_pembayaran']) ?></td>
                <td><?= $value['nama_kasir'] ?></td>
                <td><img style="width:70px;" src="<?= 'http://localhost/manajemen_puskesmas/public/upload/' . $value['bukti_bayar'] . '' ?>"></td>
                <td><?= $value['ket'] ?></td>
                <td><?= $value['tanggal'] ?></td>
                <td><a href="<?= base_url() ?>/admin/transaksi/delete/<?= $value['id_transaksi'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/trash.svg"></a>
                    <a href="<?= base_url() ?>/admin/transaksi/find/<?= $value['id_transaksi'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/pencil.svg"></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- $pager->links('page', 'bootstrap') -->
</div>


<?= $this->endSection() ?>