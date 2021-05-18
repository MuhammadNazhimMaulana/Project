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
        <a class="btn btn-primary" href="<?= base_url('/admin/pasien/create') ?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?php echo $judul ?></h3>
    </div>

</div>



<div class="row mt-3">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama Pasien</th>
            <th>Jadwal Periksa</th>
            <th>Pemeriksa</th>
            <th>Ruang</th>
            <th>Pendaftaran</th>
            <th>Aksi</th>
        </tr>
        <?php $no ?>
        <?php foreach ($pasien_data as $key => $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['firstname'] ?></td>
                <td><?= $value['jadwal_periksa'] ?></td>
                <td><?= $value['nama_dokter'] ?></td>
                <td><?= $value['nama_ruang'] ?></td>
                <td><?= $value['kebutuhan'] ?></td>
                <td><a href="<?= base_url() ?>/admin/pasien/delete/<?= $value['id_pasien'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/trash.svg"></a>
                    <a href="<?= base_url() ?>/admin/pasien/find/<?= $value['id_pasien'] ?>"><img src="http://localhost/manajemen_puskesmas/icon/pencil.svg"></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- $pager->links('page', 'bootstrap') -->
</div>


<?= $this->endSection() ?>