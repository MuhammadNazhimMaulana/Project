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
                                    <th>Nama Ruangan</th>
                                    <th>Kapasitas</th>
                                </tr>
                                <?php $no ?>
                                <?php foreach ($room as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nama_ruang'] ?></td>
                                        <td><?= $value['kapasitas'] ?></td>
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