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
    <form action="<?= base_url('/admin/pembelian_obat/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id">ID</label>
            <select class="form-select" name="id" id="id">
                <?php foreach ($user as $key => $value) : ?>
                    <option <?php if ($value['id'] == $beli['id']) echo "selected" ?> value="<?= $value['id'] ?>"><?= $value['firstname'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_pasien">Pasien</label>
            <select class="form-select" name="id_pasien" id="id_pasien">
                <option value="1">Cari Pasien</option>
                <?php foreach ($pasien as $key => $value) : ?>
                    <option <?php if ($value['id_pasien'] == $beli['id_pasien']) echo "selected" ?> value="<?= $value['id_pasien'] ?>"><?= $value['jadwal_periksa'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_transaksi">Transaksi</label>
            <select class="form-select" name="id_transaksi" id="id_transaksi">
                <?php foreach ($trans as $key => $value) : ?>
                    <option <?php if ($value['id_transaksi'] == $beli['id_transaksi']) echo "selected" ?> value="<?= $value['id_transaksi'] ?>"><?= $value['ket'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="id_obat">Obat</label>
            <select class="form-select" name="id_obat" id="id_obat">
                <?php foreach ($obat as $key => $value) : ?>
                    <option <?php if ($value['id_obat'] == $beli['id_obat']) echo "selected" ?> value="<?= $value['id_obat'] ?>"><?= $value['nama_obat'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="jumlah_beli">Total Beli</label>
            <input type="number" name="jumlah_beli" class="form-control" value="<?= $beli['jumlah_beli'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="bukti_bayaran">Tanggal</label>
            <input type="file" name="bukti_bayaran" class="form-control">
        </div>
        <input type="hidden" name="bukti_bayaran" class="form-control" value="<?= $beli['bukti_bayaran'] ?>">
        <input type="hidden" name="id_pembelian" class="form-control" value="<?= $beli['id_pembelian'] ?>">
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>