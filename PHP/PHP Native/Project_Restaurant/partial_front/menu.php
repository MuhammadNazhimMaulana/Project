<?php include('config/constant.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Penting untuk membuat website responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Restoran</title>

    <!-- Link untuk CSS nya -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Sistem Navbar Mulai disini -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITE_URL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix">

            </div>
        </div>
    </section>
    <!-- Sistem Navbar  Selesai disini -->