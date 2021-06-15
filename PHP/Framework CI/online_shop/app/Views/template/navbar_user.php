<?php $session = session(); ?>

<!-- Ini awal dari Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <?php if ($session->get('isLoggedIn')) : ?>
            <a class="navbar-brand" href="<?= site_url('home/index') ?>">Online Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <?php else : ?>
            <a class="navbar-brand" href="<?= site_url('home/front') ?>">Online Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <?php endif ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if ($session->get('isLoggedIn')) : ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= site_url('home/index') ?>">Home</a>
                    </li>
                    <?php if (session()->get('role') == 0) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown_01" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Barang
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown_01">
                                <li><a class="dropdown-item" href="<?= site_url('Barang_C/index') ?>">List Barang</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('Barang_C/create') ?>">Create Barang</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('Transaksi_C/index') ?>">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('User/User_C/index') ?>">User</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('User/Etalase_C/index') ?>">Etalase</a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">kontak</a>
                    </li>
                </ul>
            <?php endif ?>
            <div class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <?php if ($session->get('isLoggedIn')) : ?>
                        <li class="nav-item">
                            <a class="btn btn_new" href="<?= site_url('auth/authorisasi/logout') ?>">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item me-3">
                            <a class="btn btn_new" href="<?= site_url('auth/authorisasi/login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn_new" href="<?= site_url('auth/authorisasi/register') ?>">Register</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Ini Akhir dari navbar -->