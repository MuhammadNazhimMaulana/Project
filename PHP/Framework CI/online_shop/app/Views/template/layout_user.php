<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('Tampilan/ecommerce.css') ?>" rel="stylesheet">

    <!-- Fonts link -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Rubik&display=swap" rel="stylesheet">

    <!-- Link fontawesome -->
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>

    <title>Aplikasi E-Commerce</title>
</head>

<body>

    <?= $this->include('template/navbar_user') ?>

    <?= $this->renderSection('panel') ?>

    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Awal section Gelap -->
    <section class="dark py-5" style="margin-top: 100px;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-9 m-auto text-center">
                    <h1 class="mb-5">Bergabung dengan Kami</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 class="pb-3">Pelayanan Pelanggan</h5>
                            <p>Regular</p>
                            <p>Tepat Waktu</p>
                            <p>Selalu peduli</p>
                        </div>
                        <div class="col-lg-3">
                            <h5 class="pb-3">Pelayanan Pelanggan</h5>
                            <p>Regular</p>
                            <p>Tepat Waktu</p>
                            <p>Selalu peduli</p>
                        </div>
                        <div class="col-lg-3">
                            <h5 class="pb-3">Pelayanan Pelanggan</h5>
                            <p>Regular</p>
                            <p>Tepat Waktu</p>
                            <p>Selalu peduli</p>
                        </div>
                        <div class="col-lg-3">
                            <h5 class="pb-3">Pelayanan Pelanggan</h5>
                            <span><i class="fab fa-facebook"></i></span>
                            <span><i class="fab fa-instagram"></i></span>
                            <span><i class="fab fa-twitter"></i></span>
                            <span><i class="fab fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-center">Copyright ©2021 All rights reserved | Ini di buat oleh Bonevian</p>
        </div>
    </section>
    <!-- Akhir section gelap -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- JQuery-6 -->
    <script src="<?= base_url('jquery-3.6.0.min.js') ?>"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <!-- Untuk menjalankan script buatan sendiri -->
    <?= $this->renderSection('script') ?>
</body>

</html>