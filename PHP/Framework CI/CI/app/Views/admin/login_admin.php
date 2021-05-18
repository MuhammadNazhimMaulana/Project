<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Login</h3>
                <hr>
                <?php if (!empty($info)) { ?>
                    <div class="alert alert-warning">
                        <?php echo $info; ?>
                    </div>
                <?php } ?>
                <form class="" action="<?= base_url("/Admin/cek_login"); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="from-control" name="username" id="username" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Sandi Admin</label>
                        <input type="password" class="from-control" name="password" id="password" value="">
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>