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
    <h1>Insert Data</h1>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/pasien/insert') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">ID</label>
            <select class="form-select" name="id" id="id">
                <option value="1">Cari Nama</option>
                <?php foreach ($user as $key => $value) : ?>
                    <option value="<?= $value['id'] ?>"><?= $value['firstname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="jadwal_periksa">Jadwal</label>
            <input type="date" name="jadwal_periksa" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="id_dokter">Dokter</label>
            <select class="form-select" name="id_dokter" id="id_dokter">
                <option value="1">Cari Dokter</option>
                <?php foreach ($dokter as $key => $value) : ?>
                    <option value="<?= $value['id_dokter'] ?>"><?= $value['nama_dokter'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_ruang">Nama Ruangan</label>
            <select class="form-select" name="id_ruang" id="id_ruang">
                <option value="1">Pilih</option>
                <?php foreach ($ruang as $key => $value) : ?>
                    <option value="<?= $value['id_ruang'] ?>"><?= $value['nama_ruang'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_daftar">Kebutuhan</label>
            <select class="form-select" name="id_daftar" id="id_daftar">
                <option value="1">Pilih</option>
                <?php foreach ($daftar as $key => $value) : ?>
                    <option value="<?= $value['id_daftar'] ?>"><?= $value['sakit'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_obat">Kebutuhan</label>
            <select class="form-select" name="id_obat" id="id_obat">
                <option value="1">Cari Obat</option>
                <?php foreach ($obat as $key => $value) : ?>
                    <option value="<?= $value['id_obat'] ?>"><?= $value['nama_obat'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>