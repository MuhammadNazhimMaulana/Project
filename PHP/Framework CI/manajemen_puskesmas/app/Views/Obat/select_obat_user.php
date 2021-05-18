<?= $this->extend('template/user') ?>

<?= $this->section('utama') ?>

<?php
if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}
?>

<section class="pasien" style="margin-top: 150px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="col-md-12">
                    <div class="card text-dark bg-light mb-3" style="max-width: 150rem;">
                        <div class="card-header d-flex justify-content-center" style="font-size: 2rem;"><?= $judul ?></div>
                        <div class="card-body">
                            <table class="table table-striped" style="font-size: 1.5rem;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>