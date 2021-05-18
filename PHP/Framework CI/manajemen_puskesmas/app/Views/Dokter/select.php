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
        <a class="btn btn-primary" href="<?= base_url('/admin/dokter/create') ?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?php echo $judul ?></h3>
    </div>

</div>



<div class="row mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama Dokter</th>
            <th>Rumah Sakit</th>
            <th>Spesialis</th>
            <th>Jadwal (Hari)</th>
            <th>Jadwal (Jam)</th>
            <th>Klinik</th>
            <th>Aksi</th>
        </tr>
        <?php $no ?>
        <?php foreach ($spesialis as $key => $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama_dokter'] ?></td>
                <td><?= $value['rumah_sakit'] ?></td>
                <td><?= $value['spesialis'] ?></td>
                <td><?= $value['jadwal_hari'] ?></td>
                <td><?= $value['jadwal_waktu'] ?></td>
                <td><?= $value['jenis_klinik'] ?></td>
                <td><a href="<?= base_url() ?>/admin/dokter/delete/<?= $value['id_dokter'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/trash.svg"></a>
                    <a href="<?= base_url() ?>/admin/dokter/find/<?= $value['id_dokter'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/pencil.svg"></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?= $pager->links('page', 'bootstrap') ?>
</div>


<?= $this->endSection() ?>