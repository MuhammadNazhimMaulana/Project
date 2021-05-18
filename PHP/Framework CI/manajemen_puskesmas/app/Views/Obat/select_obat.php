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
        <a class="btn btn-primary" href="<?= base_url('/admin/obat/create') ?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?php echo $judul ?></h3>
    </div>

</div>



<div class="row mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama Obat</th>
            <th>Stok</th>
            <th>Tanggal Kadaluarsa</th>
            <th>Perusahaan</th>
            <th>Aksi</th>
        </tr>
        <?php $no ?>
        <?php foreach ($obat as $key => $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama_obat'] ?></td>
                <td><?= $value['stok'] ?></td>
                <td><?= $value['tanggal_kadaluarsa'] ?></td>
                <td><?= $value['perusahaan'] ?></td>
                <td><a href="<?= base_url() ?>/admin/obat/delete/<?= $value['id_obat'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/trash.svg"></a>
                    <a href="<?= base_url() ?>/admin/obat/find/<?= $value['id_obat'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/pencil.svg"></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?= $pager->links('page', 'bootstrap') ?>
</div>


<?= $this->endSection() ?>