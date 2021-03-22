<?php 
    // include constant
    include('../config/constant.php');

    // Destroy session
    session_destroy(); // unset $username

    // Redirect ke halaman login
    header('location:'.SITE_URL.'admin/login.php');
?>