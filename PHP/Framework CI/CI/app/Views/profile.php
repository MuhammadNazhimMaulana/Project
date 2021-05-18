<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3><?= $user['firstname'] . ' ' . $user['lastname'] ?></h3>
                <hr>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?= base_url("/Users/profile"); ?>" method="post">
                    <div class="row">
                        <div class="form-row col-12">
                            <div class="form-group col-sm-6">
                                <label for="firstname">Nama Depan</label>
                                <input type="text" class="form-control" id="firstname" placeholder="Nama Depan" name="firstname" value="<?= $user['firstname'] ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="lastname">Nama Belakang</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Nama Belakang" name="lastname" value="<?= $user['lastname'] ?>">
                            </div>
                            <div class="form-row col-12">
                                <div class="form-group col-sm-6">
                                    <label for="ktp">Nomor KTP</label>
                                    <input type="text" class="form-control" readonly id="ktp" placeholder="ktp" name="ktp" value="<?= $user['ktp'] ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="alamat Rumah" name="alamat" value="<?= $user['alamat'] ?>">
                                </div>
                                <div class="form-row col-12">
                                    <div class="form-group col-md-5">
                                        <label for="kota">Kota</label>
                                        <input type="text" class="form-control" readonly id="kota" placeholder="Kota Asal" name="kota" value="<?= $user['kota'] ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" class="form-control" readonly id="provinsi" placeholder="Provinsi Asal" name="provinsi" value="<?= $user['provinsi'] ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" class="form-control" readonly id="kode_pos" placeholder="Kode Pos" name="kode_pos" value="<?= $user['kode_pos'] ?>">
                                    </div>
                                </div>
                                <div class="form-row col-12">
                                    <div class="form-group col-md-5">
                                        <label for="email">Alamat Email</label>
                                        <input type="text" class="form-control" readonly id="email" placeholder="email" name="email" value="<?= $user['email'] ?>">
                                    </div>
                                    <div class="form-row col-12">
                                        <div class="form-group col-md-5">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="password_confirm">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="password_confirm" placeholder="Konfirmasi password" name="password_confirm" value="">
                                        </div>
                                        <?php if (isset($validation)) : ?>
                                            <div class="col-12">
                                                <div class="alert alert-danger" role="alert">
                                                    <?= $validation->listErrors() ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>