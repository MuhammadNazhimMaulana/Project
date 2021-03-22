<?php 
    // Control akses
    // Cek user login atau tidak
    if(!isset($_SESSION['user'])) // Kalau tidak login
    {
        // Yang akan terjadi

        // Kembali ke login dengan pesan
        $_SESSION['pesan'] = "<div class='error text-center'>Tolong login dulu</div>";

        // Redirect
        header('location:'.SITE_URL.'admin/login.php');
    }
?> 