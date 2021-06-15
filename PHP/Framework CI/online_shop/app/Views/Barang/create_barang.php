<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>
<?php

$nama_barang = [
    'name' => 'nama_barang',
    'id' => 'nama_barang',
    'value' => null,
    'class' => 'form-control'
];

$harga = [
    'name' => 'harga',
    'id' => 'harga',
    'value' => null,
    'class' => 'form-control',
    'type' => 'number',
    'min' => 0
];

$stok = [
    'name' => 'stok',
    'id' => 'stok',
    'value' => null,
    'class' => 'form-control',
    'type' => 'number',
    'min' => 0
];

$gambar = [
    'name' => 'gambar',
    'id' => 'gambar',
    'value' => null,
    'class' => 'form-control'
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-success',
    'type' => 'submit'
];

?>

<h1 class="mt-4">Tambah Barang</h1>

<!-- OPen multipart karena ada ngirim gambar -->
<?= form_open_multipart('Barang_C/create') ?>
<div class="form-group mt-3">
    <?= form_label("Nama Barang", "nama_barang") ?>
    <?= form_input($nama_barang) ?>
</div>

<div class="form-group mt-3">
    <?= form_label("Harga Barang", "harga") ?>
    <?= form_input($harga) ?>
</div>

<div class="form-group mt-3">
    <?= form_label("Stok Barang", "stok") ?>
    <?= form_input($stok) ?>
</div>

<div class="form-group mt-3">
    <?= form_label("Gambar", "gambar") ?>

    <!-- Form Upload karena mau upload gambar -->
    <?= form_upload($gambar) ?>
</div>

<div class="d-flex justify-content-end mt-3">

    <!-- Form submit terkait submit-->
    <?= form_submit($submit) ?>
</div>

<?= form_close() ?>
<?= $this->endSection() ?>