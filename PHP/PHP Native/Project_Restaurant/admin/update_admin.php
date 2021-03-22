<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Halaman Update Admin</h1>

        <br><br>

        <?php 
            // Dapatkan id
            $id = $_GET['id'];

            // Membuat query untuk mendapat detail
            $sql = "SELECT * FROM tbl_admin WHERE id = $id";

            // Eksekusi query
            $res = mysqli_query($conn, $sql);

            // Cek apakah query dieksekusi atau tidak
            if($res==True)
            {
                // Cek apakah datanya ada atau tidak
                $count = mysqli_num_rows($res);

                // Cek apakah ada data atau tidak
                if($count == 1)
                {
                    // Dapatkan detail
                   // echo "Ada admin";
                   $row = mysqli_fetch_assoc($res);

                   $full_name = $row['full_name'];
                   $username = $row['username'];
                }
                else
                {
                    // Kembali ke halaman admin
                    header('location:'.SITE_URL.'admin/manage_admin.php');
                }
            }
        
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Nama Lengkap: </td>
                    <td>
                        <input type="text" name="full_name" id="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" id="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                <tr>

                    <td colspan="2"></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php 

    // Cek Tombol submit ditekan atau tidak
    if(isset($_POST['submit']))
    {
        // echo "Tertekan";
        //Dapatkan seluruh nilai yang update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Membuat query untuk melakukan update
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id = '$id'
        ";

        // Eksekusi query 
        $res = mysqli_query($conn, $sql);

        // Cek query tereksekusi atau tidak
        if($res==true)
        {
            // Query tereksekusi dan admin terupdate
            $_SESSION['update'] = "Berhasil update";

            // Redirect ke halaman Admin
            header('location:'.SITE_URL.'admin/manage_admin.php');
        }
        else
        {
            // Gagal melakukan update
            $_SESSION['update'] = "Gagal Update";

            // Redirect ke Halaman Admin
            header('location:'.SITE_URL.'admin/manage_admin.php');
        }
    }

?>

<?php include('partials/footer.php'); ?>