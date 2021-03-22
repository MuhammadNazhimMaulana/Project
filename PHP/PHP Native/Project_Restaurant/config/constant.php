<?php
    //Start Session
    session_start();


    //Membuat konstan untuk menyimpan data
        define('SITE_URL', 'http://localhost/Project_Restaurant/');
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'pesan-makan');
        

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($link)); //Koneksi
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($link)); //Memilih database

?>