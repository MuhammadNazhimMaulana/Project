<?php include('../config/constant.php') ?>

<html>
    <head>
        <title>Login - Sistem Pemesanan Makanan</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1><br><br>

            <?php 
                    if(isset($_SESSION['gagal']))
                    {
                        echo $_SESSION['gagal']; // Memunculkan pesan session
                        unset($_SESSION['gagal']); //Menghilangkan pesan session
                    }

                    if(isset($_SESSION['pesan']))
                    {
                        echo $_SESSION['pesan']; // Memunculkan pesan session
                        unset($_SESSION['pesan']); //Menghilangkan pesan session
                    }
            ?>
<br><br>
            <!-- Login Form mulai disini -->
            <form action="" method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" id="username" placeholder="Masukkan Username"><br><br>
            Password: <br>
            <input type="password" name="password" id="password" placeholder="Masukkan Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
            </form>
            <!-- Login Form selesai disini -->

            <p class="text-center">Dibuat oleh - <a href="#">Muhammad Nazhim Maulana</a></p>
        </div>


    </body>
</html>

<?php 

    // Cek Bila tombol submit di pencet
    if(isset($_POST['submit']))
    {
        // Proses untuk login
        // Ambil data dari login
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // SQL untuk mengecek username dan password ada atau tidak
        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

        // Eksekusi query
        $res = mysqli_query($conn, $sql);

        // Hitung baris untung cek keberadaan user
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            // User ada dan sukses login
            $_SESSION['login'] = "<div class='success'>Berhasil melakukan login</div>";
            $_SESSION['user'] = $username; // Untuk cek siapa yang sedang login
            
            // Redirect ke Home
            header('location:'.SITE_URL.'admin/');
        }
        else
        {
            // User tidak ada dan login gagal
            $_SESSION['gagal'] = "<div class='error text-center'>Gagal melakukan login</div>";

            // Redirect ke Login
            header('location:'.SITE_URL.'admin/login.php');
        }
    }
?>