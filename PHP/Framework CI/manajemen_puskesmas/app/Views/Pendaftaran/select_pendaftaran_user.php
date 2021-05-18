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

<!-- Bagian Home mulai dari sini -->
<section class="home" id="home" style="margin-top: 200px; margin-bottom: 200px;">
    <div class="container mt-5 pr-5">
        <div class="row align-items-center text-center text-md-left">
            <div class="col-md-6 pr-md-5" data-aos="zoom-in">
                <div class="col">
                    <h1 style="margin-left: 0;"><?php echo $judul ?></h1>
                </div>
                <table class="table">
                    <tr class="table-primary">
                        <th>No.</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Spesialis</th>
                        <th>Keterangan</th>
                    </tr>
                    <?php $no ?>
                    <?php foreach ($daftar_data as $key => $value) : ?>
                        <tr class="table-primary">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['sakit'] ?></td>
                            <td><?= $value['nama_dokter'] ?></td>
                            <td><?= $value['kebutuhan'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col-md-6 pl-md-5 content" data-aos="fade-left">
                <h1><span>Terima </span> Kasih
                    <h3><span style="  color: var(--blue);"><?php
                                                            if (!empty(session()->get('firstname'))) {
                                                                echo session()->get('firstname');
                                                                $email = session()->get('email');
                                                            }
                                                            ?></span>, karena sudah mendaftar dan anda bisa mendaftar lagi</h3>
                    <a href="<?= base_url('/user/pendaftaran/create') ?>"><button class="button">Daftar</button></a>
            </div>
        </div>
    </div>
</section>

<!-- Bagian home selesai disini -->

<?= $this->endSection() ?>