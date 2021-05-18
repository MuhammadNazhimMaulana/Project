<!DOCTYPE>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">
    <title>Admin Aplikasi Puskesmas</title>
</head>

<body>
    <?php
    $uri = service('uri');
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Login Puskesmas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            $level = session()->get('level');
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if ($level === "1") : ?>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'dashboard_admin' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/dashboard_admin"); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'pendaftar' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/pendaftar"); ?>">Pendaftar</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'dokter' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/dokter"); ?>">Dokter</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'obat_admin' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/obat_admin"); ?>">Obat</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'ruang' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/ruang"); ?>">Ruangan</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'pasien_list' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/pasien_list"); ?>">Pasien</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'pembelian_obat' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/pembelian_obat"); ?>">Beli Obat</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'pembayaran' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/pembayaran"); ?>">Pembayaran</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'laporan_pengunjung' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/laporan_pengunjung"); ?>">Laporan</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($level === "2") : ?>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'dashboard_admin' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/dashboard_admin"); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'pembelian_obat' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/pembelian_obat"); ?>">Beli Obat</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'pembayaran' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/pembayaran"); ?>">Pembayaran</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'laporan_pengunjung' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/laporan_pengunjung"); ?>">Laporan</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($level === "3") : ?>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'dashboard_admin' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/dashboard_admin"); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'obat_admin' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/obat_admin"); ?>">Obat</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'pembelian_obat' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/admin/pembelian_obat"); ?>">Beli Obat</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link"><?= session()->get('nama') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("/logout"); ?>">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>