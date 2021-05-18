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
        <a class="btn btn-primary" href="<?= base_url('/admin/laporan_pengunjung/create') ?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?php echo $judul ?></h3>
    </div>

</div>



<div class="row mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Transaksi</th>
            <th>Admin</th>
            <th>Tanggal Bergabung</th>
            <th>Tanggal Keluar</th>
            <th>Total Transaksi</th>
            <th>Aksi</th>
        </tr>
        <?php $no ?>
        <?php foreach ($laporan_data as $key => $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['ket'] ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['tanggal_bergabung'] ?></td>
                <td><?= $value['tanggal_keluar'] ?></td>
                <td><?= $value['total_transaksi'] ?></td>
                <td><a href="<?= base_url() ?>/admin/laporan_pengunjung/delete/<?= $value['id_laporan'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/trash.svg"></a>
                    <a href="<?= base_url() ?>/admin/laporan_pengunjung/find/<?= $value['id_laporan'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/pencil.svg"></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- $pager->links('page', 'bootstrap') -->
</div>


<?= $this->endSection() ?>