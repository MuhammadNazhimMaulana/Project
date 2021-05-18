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
    <form action="<?= base_url('/admin/transaksi/insert') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">ID</label>
            <select class="form-select" name="id" id="id">
                <?php foreach ($user as $key => $value) : ?>
                    <option value="<?= $value['id'] ?>"><?= $value['firstname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_pasien">Pasien</label>
            <select class="form-select" name="id_pasien" id="id_pasien">
                <option value="1">Cari Pasien</option>
                <?php foreach ($pasien as $key => $value) : ?>
                    <option value="<?= $value['id_pasien'] ?>"><?= $value['jadwal_periksa'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="biaya_pembayaran">Biaya</label>
            <input type="number" name="biaya_pembayaran" class="form-control">
        </div>
        <div class="form-group">
            <label for="nama_kasir">Nama Kasir</label>
            <input type="text" name="nama_kasir" class="form-control">
        </div>
        <div class="form-group">
            <label for="bukti_bayar">Bukti</label>
            <input type="file" name="bukti_bayar" class="form-control">
        </div>
        <div class="form-group">
            <label for="ket">Keterangan</label>
            <input type="text" name="ket" class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>