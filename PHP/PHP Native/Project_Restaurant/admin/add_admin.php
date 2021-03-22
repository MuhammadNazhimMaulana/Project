<?php include('partials/menu.php') ?>    

<div class="main-content">
    <div class="wrapper">
        <h1>Tambah Admin</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add'])) // Cek session 
            {
                echo $_SESSION['add']; // Menampilkan pesan session
                unset ($_SESSION['add']); //menghapus pesan session
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Nama Lengkap :</td>
                    <td><input type="text" name="full_name" id="full_name" placeholder="Nama Lengkap Anda"></td>
                </tr>

                <tr>
                    <td>Username :</td>
                    <td><input type="text" name="username" id="username" placeholder="Username yang digunakan"></td>
                </tr>

                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="password" id="password" placeholder="Masukkan Password yang kuat"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Tambah Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php') ?>

<?php 
    //Memproses Nilai yang telah didapatkan
    //Mengecek Tombol

    if(isset($_POST['submit']))
    {
        //Tombol terklik
       // echo "Tombol Tertekan";

       //1. Mendapatkan Data
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $password = md5($_POST['password']);//Enkripsi Password dengan md5

       //2. SQL Query untuk melakukan Save data
       $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
       ";

       //3. Ekseskusi query ke dalam database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($link));

       // 4. Check data sudah tersimpan atau belum
       if($res==TRUE)
       {
           // Data Tersimpan
           //echo "Data Tersimpan";
            //Membuat variabel session
            $_SESSION['add'] = "Admin beerhasil ditambahkan";

            //Redirect halaman
            header("location:".SITE_URL.'admin/manage_admin.php');
       }
       else
       {
           //Gagal menyimpan data
           //echo "Gagal Menyimpan Data";
            //Membuat variabel session
            $_SESSION['add'] = "Admin Gagal ditambahkan";

            //Redirect halaman
            header("location:".SITE_URL.'admin/manage_admin.php');

       }
    }

?>