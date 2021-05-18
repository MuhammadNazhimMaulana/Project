<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Offline -->
    <link href="http://localhost/manajemen_puskesmas/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link href="http://localhost/manajemen_puskesmas/public/General/css/login.css" rel="stylesheet">

    <!-- Untuk Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <title>Halaman Login Admin</title>
</head>

<body>
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <div class="col">
                    <?php
                    if (!empty($info)) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $info;
                        echo '</div>';
                    }
                    ?>
                </div>
                <h1 class="card-title text-center">Login Admin</h1>
                <div class="card-text">
                    <form action="<?= base_url('/admin/Login_Admin') ?>" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group mt-3 d-grid gap-2">
                            <input type="submit" name="login" class="btn btn-primary" value="login">
                        </div>

                        <div class="daftar">
                            Tidak Punya Akun? <a href="#">Ayo Daftar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>