<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>

<h1>Etalase</h1>
<div class="container mt-4 mb-5">
    <div class="row">
        <?php foreach ($model as $etalase) : ?>
            <div class="col-4">
                <div class="card text-center">
                    <div class="card-header">
                        <span class="text-success"><strong><?= $etalase->nama_barang ?></strong></span>
                    </div>
                    <div class="card-body">
                        <img src="<?= base_url('uploads/' . $etalase->gambar) ?>" class="img-thumbnail" style="max-height: 200px">
                        <h5 class="mt-3 text-success"><?= "Rp " . number_format($etalase->harga, 2, ',', '.') ?></h5>
                        <p class="text-info">Stok : <?= $etalase->stok ?></p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="<?= site_url('User/Etalase_C/beli/' . $etalase->id_barang) ?>" style="width : 100%">Beli</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection() ?>