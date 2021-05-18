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
    <h3>Insert Data Dokter</h3>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/laporan_pengunjung/insert') ?>" method="POST">
        <div class="form-group mt-3">
            <label for="id_transaksi">Tanggal</label>
            <select class="form-select" name="id_transaksi" id="id_transaksi">
                <option value="1">Cari Transaksi</option>
                <?php foreach ($transaksi as $key => $value) : ?>
                    <option value="<?= $value['id_transaksi'] ?>"><?= $value['tanggal'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_admin">Admin</label>
            <select class="form-select" name="id_admin" id="id_admin">
                <option value="1">Cari Admin</option>
                <?php foreach ($admin as $key => $value) : ?>
                    <option value="<?= $value['id_admin'] ?>"><?= $value['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="tanggal_bergabung">Tanggal Bergabung</label>
            <input type="date" name="tanggal_bergabung" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="total_transaksi">Total Transaksi</label>
            <input type="number" name="total_transaksi" class="form-control">
        </div>
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>