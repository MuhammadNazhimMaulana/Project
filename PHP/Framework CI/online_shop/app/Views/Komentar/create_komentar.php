<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>
<?php
$komentar = [
    'name' => 'komentar',
    'id' => 'komentar',
    'value' => null,
    'class' => 'form-control'
];

$barang = [
    'name' => 'id_barang',
    'id' => 'id_barang',
    'value' => $id_barang,
    'type' => 'hidden'
];

$user = [
    'name' => 'id_user',
    'id' => 'id_user',
    'value' => session()->get('id_user'),
    'type' => 'hidden'
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Tambah Komentar',
    'type' => 'submit',
    'class' => 'btn btn-success'
];
?>

<h1 class="mt-4">Tambah Komentar</h1>

<?= form_open('User/Komentar_C/create/' . $id_barang) ?>
<?= form_input($user) ?>
<?= form_input($barang) ?>

<div class="form-group">
    <?= form_label("Komentar", 'komentar') ?>
    <?= form_textarea($komentar) ?>
</div>
<div class="d-flex justify-content-end mt-3">
    <?= form_submit($submit) ?>
</div>

<?= form_close() ?>

<?= $this->endSection() ?>

<!-- Section Load Javascript -->
<?= $this->section('script') ?>
<script src="<?= base_url('ckeditor_5/ckeditor.js') ?>" type="text/javascript"></script>

<!-- Untuk styling sedikit -->
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>

<script>
    ClassicEditor
        .create(document.querySelector('#komentar'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection() ?>