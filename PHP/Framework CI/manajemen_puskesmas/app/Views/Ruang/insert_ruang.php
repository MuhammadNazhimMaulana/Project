<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . "=>" . $value;
            echo "</br>";
        }
        echo '</div>';
    }
    ?>
</div>

<div class="col">
    <h1><?= $judul ?></h1>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/ruang/insert') ?>" method="POST">
        <div class="form-group mt-3">
            <label for="nama_ruang">Nama Ruang</label>
            <input type="text" name="nama_ruang" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control">
        </div>
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>