<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('info');
        echo '</div>';
    }
    ?>
</div>

<div class="col">
    <h1><?= $judul ?></h1>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/pasien/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">ID</label>
            <select class="form-select" name="id" id="id">
                <?php foreach ($user as $key => $value) : ?>
                    <option <?php if ($value['id'] == $pasien['id']) echo "selected" ?> value="<?= $value['id'] ?>"><?= $value['firstname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="jadwal_periksa">Jadwal</label>
            <input type="date" name="jadwal_periksa" class="form-control" value="<?= $pasien['jadwal_periksa'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="id_dokter">Dokter</label>
            <select class="form-select" name="id_dokter" id="id_dokter">
                <?php foreach ($dokter as $key => $value) : ?>
                    <option <?php if ($value['id_dokter'] == $pasien['id_dokter']) echo "selected" ?> value="<?= $value['id_dokter'] ?>"><?= $value['nama_dokter'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_ruang">Nama Ruangan</label>
            <select class="form-select" name="id_ruang" id="id_ruang">
                <?php foreach ($ruang as $key => $value) : ?>
                    <option <?php if ($value['id_ruang'] == $pasien['id_ruang']) echo "selected" ?> value="<?= $value['id_ruang'] ?>"><?= $value['nama_ruang'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_daftar">Kebutuhan</label>
            <select class="form-select" name="id_daftar" id="id_daftar">
                <?php foreach ($pendaftar as $key => $value) : ?>
                    <option <?php if ($value['id_daftar'] == $pasien['id_daftar']) echo "selected" ?> value="<?= $value['id_daftar'] ?>"><?= $value['sakit'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_obat">Kebutuhan</label>
            <select class="form-select" name="id_obat" id="id_obat">
                <?php foreach ($obat as $key => $value) : ?>
                    <option <?php if ($value['id_obat'] == $pasien['id_obat']) echo "selected" ?> value="<?= $value['id_obat'] ?>"><?= $value['nama_obat'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="id_pasien" class="form-control" value="<?= $pasien['id_pasien'] ?>">
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>