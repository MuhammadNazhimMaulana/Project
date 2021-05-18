<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- Link untuk font-awesone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- Link menuju CSS -->
    <link rel="stylesheet" href="http://localhost/manajemen_puskesmas/public/General/css/side.css">

    <!-- oofline bootstrap -->
    <link href="http://localhost/manajemen_puskesmas/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <input type="checkbox" id="check">
    <!-- Bagian Header Mulai disini -->
    <header style="height: 70px;">
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3 style="margin-top: -11px;"><span>M</span>anajemen <span>P</span>uskesmas</h3>
        </div>
        <div class="right_area">
            <a href="<?= base_url('admin/login_admin/logout') ?>" class="logout_btn">Logout</a>
        </div>
    </header>
    <!-- Bagian Header selesai disini -->

    <!-- Bagian sidebar mulai disini -->

    <div class="sidebar">
        <center>
            <img src="http://localhost/manajemen_puskesmas/public/General/images/Doctors.png" class="profile_image" width="100px" alt="">
            <h4><?php
                if (!empty(session()->get('username'))) {
                    echo session()->get('username');
                    $level = session()->get('level');
                }
                ?></a></h4>
        </center>
        <?php if ($level === "1") : ?>
            <a href="<?= base_url('/admin/dokter') ?>"><i class="fas fa-desktop"></i><span>Dokter</span></a>
            <a href="<?= base_url('/admin/obat') ?>"><i class="fas fa-cogs"></i><span>Obat</span></a>
            <a href="<?= base_url('/admin/laporan_pengunjung') ?>"><i class="fas fa-table"></i><span>Laporan</span></a>
            <a href="<?= base_url('/admin/pembelian_obat') ?>"><i class="fas fa-th"></i><span>Beli Obat</span></a>
            <a href="<?= base_url('/admin/pendaftaran') ?>"><i class="fas fa-info-circle"></i><span>Pendaftaran</span></a>
            <a href="<?= base_url('/admin/ruang') ?>"><i class="fas fa-sliders-h"></i><span>Ruang</span></a>
            <a href="<?= base_url('/admin/pasien') ?>"><i class="fas fa-sliders-h"></i><span>Pasien</span></a>
            <a href="<?= base_url('/admin/transaksi') ?>"><i class="fas fa-sliders-h"></i><span>Transaksi</span></a>
            <a href="<?= base_url('/admin/users') ?>"><i class="fas fa-sliders-h"></i><span>Pengguna</span></a>
        <?php endif; ?>
        <?php if ($level === "2") : ?>
            <a href="<?= base_url('/admin/pembelian_obat') ?>"><i class="fas fa-th"></i><span>Beli Obat</span></a>
            <a href="<?= base_url('/admin/transaksi') ?>"><i class="fas fa-sliders-h"></i><span>Transaksi</span></a>
        <?php endif; ?>
        <?php if ($level === "3") : ?>
            <a href="<?= base_url('/admin/obat') ?>"><i class="fas fa-cogs"></i><span>Obat</span></a>
            <a href="<?= base_url('/admin/pembelian_obat') ?>"><i class="fas fa-th"></i><span>Beli Obat</span></a>
        <?php endif; ?>
    </div>

    <!-- Bagian sidebar selesai disini -->

    <!-- Bagian Content -->

    <div class="container">
        <div class="row">
            <?= $this->renderSection('dashboard') ?>
            <div class="col-8" style="margin-top: 110px; margin-left: 400px;">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

</body>

</html>