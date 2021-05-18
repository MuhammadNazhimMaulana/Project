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
    <form action="<?= base_url('/admin/users/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-3">
            <label for="firstname">Nama Depan</label>
            <input type="text" name="firstname" class="form-control" value="<?= $user['firstname'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="lastname">Nama Belakang</label>
            <input type="text" name="lastname" class="form-control" value="<?= $user['lastname'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="ktp">KTP</label>
            <input type="text" name="ktp" class="form-control" value="<?= $user['ktp'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $user['alamat'] ?>">
        </div>
        <div class="row mt-3 mb-3">
            <div class="form-group col-6">
                <label for="kota">Kota</label>
                <input type="text" name="kota" class="form-control" value="<?= $user['kota'] ?>">
            </div>
            <div class="form-group col-6">
                <label for="provinsi">Provinsi</label>
                <input type="text" name="provinsi" class="form-control" value="<?= $user['provinsi'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="kode_pos">Kode Pos</label>
            <input type="number" name="kode_pos" class="form-control" value="<?= $user['kode_pos'] ?>">
        </div>
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?= $user['email'] ?>">
        </div>
        <input type="hidden" name="id" class="form-control" value="<?= $user['id'] ?>">
        <div class="form-group mt-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="simpan">
        </div>

    </form>
</div>

<?= $this->endSection() ?>