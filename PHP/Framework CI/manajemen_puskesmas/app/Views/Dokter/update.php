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
    <h1>Update Data Dokter</h1>
</div>

<div class="col-8">
    <form action="<?= base_url() ?>/admin/dokter/update" method="post">
        <div class="form-group">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" name="nama_dokter" value="<?= $dokter['nama_dokter'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rumah_sakit">Rumah Sakit</label>
            <input type="text" value="<?= $dokter['rumah_sakit'] ?>" name="rumah_sakit" class="form-control">
        </div>
        <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input type="text" value="<?= $dokter['spesialis'] ?>" name="spesialis" class="form-control">
        </div>
        <div class="form-group">
            <label for="jadwal_hari">Jadwal Hari</label>
            <input type="text" value="<?= $dokter['jadwal_hari'] ?>" name="jadwal_hari" class="form-control">
        </div>
        <div class="form-group">
            <label for="jadwal_waktu">Jadwal Jam</label>
            <input type="text" value="<?= $dokter['jadwal_waktu'] ?>" name="jadwal_waktu" class="form-control">
        </div>
        <div class="form-group">
            <label for="jenis_klinik">Jenis Klinik</label>
            <input type="text" value="<?= $dokter['jenis_klinik'] ?>" name="jenis_klinik" class="form-control">
        </div>
        <input type="hidden" value="<?= $dokter['id_dokter'] ?>" name="id_dokter">
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>