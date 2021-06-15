<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <!-- Awal dari bergabung -->
    <section class="depan py-5 mb-5">
        <div class="container text-white py-5">
            <div class="row py-5">
                <div class="col-lg-6">
                    <h1 class="font-weight-bold py-3">Silakan bergabung untuk mulai belanja</h1>
                    <h6 style="color: black;">Senang <?php
                                                        echo session()->get('username');
                                                        ?> belanja disini</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir dari bergabung -->
</div>

<?= $this->endSection() ?>