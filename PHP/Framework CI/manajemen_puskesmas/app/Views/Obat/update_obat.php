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
    <form action="<?= base_url('/admin/obat/update') ?>" method="POST">
        <div class="form-group mt-3">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" value="<?= $obat['nama_obat'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $obat['stok'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
            <input type="date" name="tanggal_kadaluarsa" class="form-control" value="<?= $obat['tanggal_kadaluarsa'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="perusahaan">Perusahaan</label>
            <input type="text" name="perusahaan" class="form-control" value="<?= $obat['perusahaan'] ?>">
        </div>
        <input type="hidden" name="id_obat" class="form-control" value="<?= $obat['id_obat'] ?>">
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>