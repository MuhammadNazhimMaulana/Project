<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>
<?php
$username = [
    'name' => 'username',
    'id' => 'username',
    'value' => null,
    'class' => 'form-control'
];

$password = [
    'name' => 'password',
    'id' => 'password',
    'class' => 'form-control'
];

$password_confirm = [
    'name' => 'password_confirm',
    'id' => 'password_confirm',
    'class' => 'form-control'
];

$session = session();
$errors = $session->getFlashdata('errors');
?>

<div class="container mt-4 vh-100">
    <div class="row justify-content-center h-100">
        <div class="card w-50 my-auto">
            <div class="card-header text-center">
                <h1>Form Registrasi</h1>
            </div>
            <div class="card-body">
                <?php if ($errors != null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Terjadi Kesalahan</h4>
                        <hr>
                        <p class="mb-0">
                            <?php foreach ($errors as $err) {
                                echo $err . '<br>';
                            }

                            ?>
                        </p>
                    </div>
                <?php endif ?>

                <!-- Membuat Form dengan Form Helper -->
                <?= form_open('Auth/Authorisasi/register') ?>
                <div class="form-group mt-3">

                    <!-- Labelnya Username (text) untuk elemen bernama username -->
                    <?= form_label("Username", "username") ?>

                    <!-- Form input butuh array untuk mendefinisikan name -->
                    <?= form_input($username) ?>
                </div>
                <div class="form-group mt-3">
                    <?= form_label("Password", "password") ?>
                    <?= form_password($password) ?>
                </div>
                <div class="form-group mt-3">
                    <?= form_label("Password Konfirmasi", "password_confirm") ?>
                    <?= form_password($password_confirm) ?>
                </div>
                <div class="d-flex justify-content-end mt-3">

                    <!-- Form submit terkait submit-->
                    <?= form_submit('submit', 'Submit', ['class' => 'btn btn-primary']) ?>
                </div>
                <?= form_close() ?>
            </div>
            <div class="card-footer">
                <a href="<?= site_url('auth/authorisasi/login') ?>"><small>Sudah Memiliki Akun?</small></a>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>