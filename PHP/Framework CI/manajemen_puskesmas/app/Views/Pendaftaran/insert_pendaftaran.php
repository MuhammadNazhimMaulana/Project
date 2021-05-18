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
    <h1>Insert Data</h1>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/pendaftaran/insert') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="sakit">Keluhan</label>
            <input type="text" name="sakit" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="id_pasein">Dokter</label>
            <select class="form-select" name="id_dokter" id="id_dokter">
                <option>Pilih</option>
                <?php foreach ($dokter as $key => $value) : ?>
                    <option value="<?= $value['id_dokter'] ?>"><?= $value['nama_dokter'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="kebutuhan">Kebutuhan</label>
            <select class="form-select" name="kebutuhan" id="kebutuhan">
                <option>Pilih</option>
                <option>Urgent</option>
                <option>Tidak Urgent</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>