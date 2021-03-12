<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Buat Password Baru</h3>
                <hr>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?= base_url("/Users/profile_lupa"); ?>" method="post">
                    <div class="row">
                        <div class="form-row col-12">
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
                                    <button type="submit" class="btn btn-primary">Ubah</button>
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