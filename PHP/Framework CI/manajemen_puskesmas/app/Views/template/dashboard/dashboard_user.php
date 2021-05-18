<?= $this->extend('template/user') ?>

<?= $this->section('utama') ?>



<!-- Bagian Home mulai dari sini -->
<section class="home" id="home" style="margin-top:-50px; margin-bottom: -50px;">
    <div class="container mt-5 pr-5">
        <div class="row min-vh-100 align-items-center text-center text-md-left">
            <div class="col-md-6 pr-md-5" data-aos="zoom-in">
                <img src="http://localhost/manajemen_puskesmas/public/General/images/Doctors.png" width="100%" alt="">
            </div>
            <div class="col-md-6 pl-md-5 content" data-aos="fade-left">
                <h1><span>Selamat </span> Datang
                    <h3><span style="  color: var(--blue);"><?php
                                                            if (!empty(session()->get('firstname'))) {
                                                                echo session()->get('firstname');
                                                                $email = session()->get('email');
                                                            }
                                                            ?></span>, Silakan Mendaftar Untuk Melakukan Pemeriksaan</h3>
                    <a href="<?= base_url('/user/pendaftaran/create') ?>"><button class="button">Daftar</button></a>
            </div>
        </div>
    </div>
</section>

<!-- Bagian home selesai disini -->

<?= $this->endSection() ?>