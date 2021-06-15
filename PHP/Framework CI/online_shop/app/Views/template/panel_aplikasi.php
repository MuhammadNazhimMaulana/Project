<?= $this->extend('template/layout_user') ?>
<?= $this->section('panel') ?>

<!-- Awal Section -->
<section class="main">
    <div class="container py-5">
        <div class="row py-4">
            <div class="col-lg-7 pt-5 text-center">
                <h1 class="pt-5">Belanja saja disini</h1>
                <a class="btn btn_1 mt-3" style="  margin-right: 150px;" href="<?= site_url('home/index') ?>">Info Lebih</a>
            </div>
        </div>
    </div>
</section>
<!-- Akhir section -->

<!-- Awal section next -->
<section class="new">
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-7 m-auto">
                <div class="row text-center">
                    <div class="col-lg-4">
                        <img src="http://localhost/online_shop/public/img/shoes.png" class="img-fluid" alt="" width="150">
                        <h6>Baru</h6>
                    </div>
                    <div class="col-lg-4">
                        <img src="http://localhost/online_shop/public/img/Hats.png" class="img-fluid" alt="" width="100">
                        <h6>Baru</h6>
                    </div>
                    <div class="col-lg-4">
                        <img src="http://localhost/online_shop/public/img/watches.png" class="img-fluid" alt="" width="100">
                        <h6>Baru</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir section selanjutnya -->

<!-- Awal dari jualan -->
<section class="product">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-5 m-auto text-center">
                <h1>Apa yang Kami jual</h1>
                <h6 style="color: red;">Belanja disini dan anda akan senang</h6>
            </div>
        </div>
        <div class="row">
            <?php foreach ($model as $etalase) : ?>
                <div class="col-lg-3 text-center">
                    <div class="card border-0 bg-light mb-2">
                        <div class="card-body">
                            <img src="<?= base_url('uploads/' . $etalase->gambar) ?>" class="img-thumbnail" style="max-height: 200px">
                            <h5 class="mt-3 text-success"><?= "Rp " . number_format($etalase->harga, 2, ',', '.') ?></h5>
                            <p class="text-info">Stok : <?= $etalase->stok ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="row">
            <div class="col-lg-6 text-center m-auto">
                <button class="btn_1 mb-3 mt-3">Mulai Balanja</button>
            </div>
        </div>
    </div>
</section>
<!-- Akhir dari jualan -->

<!-- Awal dari bergabung -->
<section class="join py-5 mb-5">
    <div class="container text-white py-5">
        <div class="row py-5">
            <div class="col-lg-6">
                <h1 class="font-weight-bold py-3">Silakan bergabung untuk mulai belanja</h1>
                <h6>Senang Anda belanja disini</h6>
                <a class="btn btn_1 mt-3" style="  margin-right: 150px;" href="<?= site_url('auth/authorisasi/register') ?>">Bergabung</a>
            </div>
        </div>
    </div>
</section>
<!-- Akhir dari bergabung -->


<?= $this->endSection() ?>