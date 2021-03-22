<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Tambah Kategori</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) // Cek session 
            {
                echo $_SESSION['add']; // Menampilkan pesan session
                unset ($_SESSION['add']); //menghapus pesan session
            }

            if(isset($_SESSION['upload'])) // Cek session 
            {
                echo $_SESSION['upload']; // Menampilkan pesan session
                unset ($_SESSION['upload']); //menghapus pesan session
            }
        ?>
        <br><br>

        <!-- Form tambah kategori start -->
        <form action="" method="POST" enctype="multipart/form-data"> 
        
            <table class="tbl-30">
                <tr>
                    <td>Judul:</td>
                    <td>
                        <input type="text" name="title" id="title" placeholder="Judul Kategori">
                    </td>
                </tr>

                <tr>
                    <td>Pilih Gambar</td>
                    <td>
                        <input type="file" name="image" id="image">
                    </td>
                </tr>

                <tr>
                    <td>Keutamaan:</td>
                    <td>
                        <input type="radio" name="featured" id="featured" value="Yes">Yes
                        <input type="radio" name="featured" id="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Keaktifan:</td>
                    <td>
                        <input type="radio" name="active" id="active" value="Yes">Yes
                        <input type="radio" name="active" id="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" id="submit" value="Tambah Kategori" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Form tambah kategori end -->

        <?php 
            // Cek tombol submit di pencet atau tidak
            if(isset($_POST['submit']))
            {
                // echo "Clik";

                // Ambil nilai dari form
                $title = $_POST['title'];

                // Untuk input dengan radio button
                if(isset($_POST['featured']))
                {
                    // Dapatkan nilai dari form
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    // Dapatkan nilai dari form
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                // Cek apakah gambarnya ada atau tidak
                // print_r($_FILES['image']);
                // die();// Break kodenya

                if(isset($_FILES['image']['name']))
                {
                    // upload gambar
                    // Untuk upload gambar memerlukan nama gambar
                    $image_name = $_FILES['image']['name'];

                    // Upload gambar jikalau ada gambar yang dipilih
                    if($image_name != "")
                    {

                        // Auto rename file dengan extensi gambar (kpg, png, gif, dll)
                        $ext = end(explode('.', $image_name));

                        // Rename gambar
                        $image_name  = "Food_Category_".rand(000, 999). '.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        // Upload gambarnya 
                        $upload = move_uploaded_file($source_path, $destination_path);

                        // Cek gambar di upload atau tidak dan proses berhenti kalo gambar tidak terupload
                        if($upload == false)
                        {
                            // Buat pesan
                            $_SESSION['upload'] = "<div class='error'>Gagal Upload Gambar</div>";

                            // Redirect ke halaman kategori
                            header('location:'.SITE_URL.'admin/add_category.php');

                            // Menghentikan proses uploadnya 
                            die();
                        }

                    }
                }
                else
                {
                    // Jangan upload gambar
                    $image_name = "";
                }

                // Membuat query sql untuk insert kategori
                $sql = "INSERT INTO tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                ";

                // Eksekusi query dan simpan ke dalam database
                $res = mysqli_query($conn, $sql);

                // Cek query tereksekusi dan data ditambah ke database
                if($res == true)
                {
                    // Querry tereksekusi dan kategori ditambahkan
                    $_SESSION['add'] = "<div class='success'>Berhasil tambah kategori</div>";

                    // Redirect ke manajemen kategori
                    header('location:'.SITE_URL.'admin/manage_category.php');
                }
                else
                {
                    // Gagal menambah kategori
                    $_SESSION['add'] = "<div class='error'>Gagal tambah kategori</div>";
    
                    // Redirect ke manajemen kategori
                    header('location:'.SITE_URL.'admin/add_category.php');
                }
            }

        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>