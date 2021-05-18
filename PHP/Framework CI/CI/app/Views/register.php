<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Register</h3>
                <hr>
                <form class="" action="<?= base_url("/Users/register"); ?>" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="firstname">Nama Depan</label>
                                <input type="text" class="form-control" id="firstname" placeholder="Nama Depan" name="firstname" value="<?= set_value('firstname') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Nama Belakang</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Nama Belakang" name="lastname" value="<?= set_value('lastname') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-10">
                            <div class="form-group">
                                <label for="ktp">KTP</label>
                                <input type="text" class="form-control" id="ktp" placeholder="KTP" name="ktp">
                            </div>
                        </div>
                        <div class="col-12 col-sm-10">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Alamat Lengkap" name="alamat">
                            </div>
                        </div>
                        <div class="form-row col-12">
                            <div class="form-group col-md-5">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control" id="kota" placeholder="Kota Asal" name="kota">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" placeholder="Provinsi Asal" name="provinsi">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" class="form-control" id="kode_pos" placeholder="Kode Pos" name="kode_pos">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form=group">
                                <label for="email">Alamat Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Kode Pos" name="email" value="<?= set_value('email') ?>">
                            </div><br>
                        </div>
                        <div class="col-12 col-sm-5">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirm" placeholder="Password Konfirmasi" name="password_confirm" value="">
                            </div>
                        </div>
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?><br>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="<?= base_url("/"); ?>">Sudah Punya Akun?</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>