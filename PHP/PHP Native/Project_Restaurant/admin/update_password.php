<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Ubah Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }

        ?>

        <form action="" method="POST">
        
        <table class="tbl-30">
            <tr>
                <td>Password Sekarang: </td>
                <td>
                    <input type="password" name="current_password" id="current_password" placeholder="Password Lama">
                </td>
            </tr>

            <tr>
                <td>Password Baru: </td>
                <td>
                    <input type="password" name="new_password" id="new_password" placeholder="Password Baru">
                </td>
            </tr>

            <tr>
                <td>Konfirmasi Password: </td>
                <td>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password Baru">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Ubah Password" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>

    </div>
</div>

<?php 

            // Cek apakah tombol submit ditekan atau tidak
            if(isset($_POST['submit']))
            {
                // echo "Berhasil";
                // Ambil data dari form
                $id = $_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $password_confirmation = md5($_POST['password_confirmation']);

                // Cek apakah user ada atau tidak
                $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";
                
                // Eksekusi query
                $res = mysqli_query($conn, $sql);

                if($res == true)
                {
                    // Cek apakah data ada atau tidak
                    $count = mysqli_num_rows($res);

                    if($count == 1)
                    {
                        // User ada dan password bisa di ubah
                        // echo "User ditemukan";
                        // Cek apakah password baru dan konfirmasinya cocok
                        if($new_password == $password_confirmation)
                        {
                            // Update password
                            $sql2 = "UPDATE tbl_admin SET
                                password = '$new_password'
                                WHERE id = $id
                            ";

                            // Eksekusi query
                            $res2 = mysqli_query($conn, $sql2);

                            // Cek query terkesekusi
                            if($res2 == true)
                            {
                                // Pesan Berhasil
                                $_SESSION['berubah_query'] = "Berhasil mengubah password";
            
                                // Redirect pengguna
                                header("location:".SITE_URL.'admin/manage_admin.php');
                            }
                            else
                            {
                                // Pesan Gagal
                                $_SESSION['fail_query'] = "Gagal mengubah password";
            
                                // Redirect pengguna
                                header("location:".SITE_URL.'admin/manage_admin.php');
                            }
                        }
                        else
                        {
                            // Redirect ke halaman managemen admin
                            $_SESSION['password_tidak_cocok'] = "Password tidak cocok (baru dan konfirmasi)";
        
                            // Redirect pengguna
                            header("location:".SITE_URL.'admin/manage_admin.php');
                        }

                    }
                    else
                    {
                        // User tidak ada beri pesan
                        $_SESSION['user_not_found'] = "Pengguna tidak ditemukan";

                        // Redirect pengguna
                        header("location:".SITE_URL.'admin/manage_admin.php');
                    }
                }

                // Cek password baru dan konfirmasinya cocok 

                // Simpan atau perbarui password jika semua benar (yang diatas)
            }

?>


<?php include('partials/footer.php') ?>