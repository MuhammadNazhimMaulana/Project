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
                                    <th>ID</th>
                                    <th>Pasien</th>
                                    <th>Pembayaran Periksa</th>
                                    <th>Obat</th>
                                    <th>Jumlah Pembelian</th>
                                    <th>Total Bayar</th>
                                    <th>Bukti</th>
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
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>