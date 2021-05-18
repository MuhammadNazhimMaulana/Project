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
                                    <th>Nama Dokter</th>
                                    <th>Rumah Sakit</th>
                                    <th>Spesialis</th>
                                    <th>Jadwal (Hari)</th>
                                    <th>Jadwal (Jam)</th>
                                    <th>Klinik</th>
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