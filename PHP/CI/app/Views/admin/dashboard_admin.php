<div class="container">
    <div class="row">
        <div class="col-12"><br>
            <h1>Hello, <?= session()->get('nama') ?> </h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-dark" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="text-center">
                <img src="<?= base_url("/IMG/Logo.png") ?>" class="rounded" alt="..." width="400"><br><br>
                <figcaption class="figure-caption">Selamat Datang</figcaption>
            </div>
        </div>
    </div>
</div>