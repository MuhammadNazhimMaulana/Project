<?= $this->extend('template/user') ?>

<?= $this->section('utama') ?>

<<!-- Bagian Home mulai dari sini -->
    <section class="home" id="home">
        <div class="container mt-5 pr-5">
            <div class="row min-vh-100 align-items-center text-center text-md-left">
                <div class="col-md-6 pr-md-5" data-aos="zoom-in">
                    <img src="http://localhost/manajemen_puskesmas/public/General/images/Doctors.png" width="100%" alt="">
                </div>
                <div class="col-md-6 pl-md-5 content" data-aos="fade-left">
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

                    <div class="col" style="margin-left: -85px; margin-top: -100px;">
                        <h1 style="margin-bottom: 20px;">Mendaftar</h1>
                    </div>

                    <div class="col-8">
                        <form action="<?= base_url('/user/pendaftaran_user/insert') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input class="form-control" type="text" name="nama" placeholder="Nama Pasien">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="sakit" placeholder="Keluhan Pasien">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="id_dokter" id="id_dokter">
                                    <option>Pilih</option>
                                    <?php foreach ($dokter as $key => $value) : ?>
                                        <option value="<?= $value['id_dokter'] ?>"><?= $value['nama_dokter'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="kebutuhan" id="kebutuhan">
                                    <option>Pilih</option>
                                    <option>Urgent</option>
                                    <option>Tidak Urgent</option>
                                </select>
                            </div>

                            <input type="submit" name="simpan" id="" value="Daftar" class="button">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian home selesai disini -->
    <!-- Bagian Header Selesai di sini -->

    <section class="home" id="home">

    </section>
    <?= $this->endSection() ?>