<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/manajemen_puskesmas/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Halaman Admin</title>
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="<?= base_url('/admin') ?>">Dashboard</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item mt-2 ms-5">Username : </li>
                                <li class="nav-item me-4">
                                    <a class="nav-link" aria-current="page" href="<?= base_url('/admin/dokter') ?>"> <?php
                                                                                                                        if (!empty(session()->get('username'))) {
                                                                                                                            echo session()->get('username');
                                                                                                                        }
                                                                                                                        ?></a>
                                </li>
                                <li class="nav-item mt-2 ms-5">Nama : </li>
                                <li class="nav-item mt-2 ms-2">
                                    <?php
                                    if (!empty(session()->get('nama'))) {
                                        echo session()->get('nama');
                                    }
                                    ?></a>
                                </li>
                                <li class="nav-item mt-2 ms-5">Level : </li>
                                <li class="nav-item mt-2 ms-2">
                                    <?php
                                    if (!empty(session()->get('level'))) {
                                        echo session()->get('level');
                                        $level = session()->get('level');
                                    }
                                    ?></a>
                                </li>
                                <li class="nav-item mt-2 ms-2">
                                    <a href="<?= base_url('admin/login_admin/logout') ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <?php if ($level === "1") : ?>
                            <li class="list-group-item"><a href="<?= base_url('/admin/dokter') ?>">Dokter</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/obat') ?>">Obat</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/laporan_pengunjung') ?>">Laporan</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/pembelian_obat') ?>">Pembelian Obat</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/pendaftaran') ?>">Pendaftaran</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/ruang') ?>">Ruang</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/pasien') ?>">Pasien</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/transaksi') ?>">Transaksi</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/users') ?>">User</a></li>
                        <?php endif; ?>
                        <?php if ($level === "2") : ?>
                            <li class="list-group-item"><a href="<?= base_url('/admin/pembelian_obat') ?>">Pembelian Obat</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/transaksi') ?>">Transaksi</a></li>
                        <?php endif; ?>
                        <?php if ($level === "3") : ?>
                            <li class="list-group-item"><a href="<?= base_url('/admin/obat') ?>">Obat</a></li>
                            <li class="list-group-item"><a href="<?= base_url('/admin/pembelian_obat') ?>">Pembelian Obat</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-8 px-2">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>


</body>

</html>