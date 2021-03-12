<!DOCTYPE>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">
    <title>Aplikasi Puskesmas</title>
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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if (session()->get('isLoggedIn')) : ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/dashboard"); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/profile"); ?>">Biodata</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'docter' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/kategori/docter"); ?>">Dokter</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'pendaftaran' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/kategori/pendaftaran"); ?>">Pendaftaran</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'daftar_obat' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/kategori/daftar_obat"); ?>">Daftar Obat</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'jadwal' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/kategori/jadwal"); ?>">Jadwal</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'Membayar' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/kategori/Membayar"); ?>">Pembayaran</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(2) == 'beli_obat' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/kategori/beli_obat"); ?>">Pembelian</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link"><?= session()->get('firstname') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("/logout"); ?>">Log Out</a>
                        </li>
                    </ul>
                <?php else : ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/"); ?>">Login</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url("/register"); ?>">Register</a>
                        </li>
                    </ul>
            </div>
        </div>
    <?php endif; ?>
    </div>
    </nav>