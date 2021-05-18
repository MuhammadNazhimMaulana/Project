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


<div class="row  mt-5">
    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/pembelian_obat/create') ?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?php echo $judul ?></h3>
    </div>

</div>



<div class="row mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Pasien</th>
            <th>Pembayaran Periksa</th>
            <th>Obat</th>
            <th>Jumlah Pembelian</th>
            <th>Total Bayar</th>
            <th>Bukti</th>
            <th>Aksi</th>
        </tr>
        <?php $no ?>
        <?php foreach ($pembeli_obat_data as $key => $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['firstname'] ?></td>
                <td><?= $value['jadwal_periksa'] ?></td>
                <td><?= $value['ket'] ?></td>
                <td><?= $value['nama_obat'] ?></td>
                <td><?= $value['jumlah_beli'] ?></td>
                <td><?= $value['jumlah_bayar'] ?></td>
                <td><img style="width:70px;" src="<?= 'http://localhost/manajemen_puskesmas/public/upload/' . $value['bukti_bayaran'] . '' ?>"></td>
                <td><a href="<?= base_url() ?>/admin/pembelian_obat/delete/<?= $value['id_pembelian'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/trash.svg"></a>
                    <a href="<?= base_url() ?>/admin/pembelian_obat/find/<?= $value['id_pembelian'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/pencil.svg"></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- $pager->links('page', 'bootstrap') -->
</div>


<?= $this->endSection() ?>