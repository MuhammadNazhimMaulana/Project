<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Kategdori</h1>

    <br><br>

    <?php 

        // Cek ada id atau tidak
        if(isset($_GET['id']))
        {
            // Dapatkan detail yang lain
            // echo "Mendapat Data";
            $id = $_GET['id'];

            // Membuat sql untuk dapat data
            $sql = "SELECT * FROM tbl_category WHERE id = $id";

            // Eksekusi query
            $res = mysqli_query($conn, $sql);

            // Menghitung rows
            $count = mysqli_num_rows($res);

            if($count == 1)
            {
                // Dapatkan data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            }
            else
            {
                // Kembali ke manage kategori
                $_SESSION['no_category'] = "<div class='error'>Tidak ada kategori</div>";
                header('location'.SITE_URL.'admin/manage_category.php');
            }
        }
        else
        {
            // Kembali ke managa kategori
            header('location:'.SITE_URL.'admin/manage_category.php');
        }

    ?>

    <form action="" method="POST" enctype="multipart/form-data">
    
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" id="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Gambar Sekarang: </td>
                <td>
                    <?php 
                        if($current_image != "")
                        {
                            // Tamoilkan Gambar
                            ?>
                            <img src="<?php echo SITE_URL; ?>images/category/<?php echo $current_image?>" width="150px">
                            <?php
                        }
                        else
                        {
                            // Tampilkan pesan error
                            echo "<div class='error'>Tidak ada gambar</div>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Gambar Baru: </td>
                <td>
                    <input type="file" name="image" id="image">
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" id="featured" value="Yes"> Yes
                    
                    <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" id="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="active" id="active" value="Yes"> Yes
                    <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="active" id="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">              
                    <input type="hidden" name="id" value="<?php echo $id; ?>">              
                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
            </tr>

        </table>

    </form>

    <?php 
    
            if(isset($_POST['submit']))
            {
                // echo "Terklik";
                // Ambil semua nilai dari form

                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                
                // Update gambar baru kalau ada yang dipilih
                // Cek apakah ada gambar baru yang dipilih
                if(isset($_FILES['image']['name']))
                {
                    // Dapatkan detail gambar 
                    $image_name = $_FILES['image']['name'];

                    // Cek gambar ada atau tidak
                    if($image_name != "")
                    {
                        // Ada gambar
                        // Upload gambar baru

                        // Auto rename file dengan extensi gambar (jpg, png, gif, dll)
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
                            header('location:'.SITE_URL.'admin/manage_category.php');

                            // Menghentikan proses uploadnya 
                            die();
                        }

                        // Hapus gambar lama kalau ada
                        if($current_image != "")
                        {
                            $remove_path = "../images/category/".$current_image;
    
                            $remove = unlink($remove_path);
    
                            // Cek gambar di hapus atau tidak
                            // Jika gagal munculkan pesannya
                            if($remove == false)
                            {
                                // Gagal menghapus gambar
                                $_SESSION['failed_remove'] = "<div class='error'>Gagal menghapus gambar sekarang</div>";
                                header('location:'.SITE_URL.'admin/manage_category.php');
                                die(); // Menghentikan proses
                            }
                        }
                    }
                    else
                    {
                       $image_name = $current_image;                        
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                // Update database
                $sql2 = "UPDATE tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
                ";

                // Eksekusi query
                $res2 = mysqli_query($conn, $sql2);

                // Kembali ke manage kategori dengan pesan
                // Ceku query di ekseskusi atau tidak
                if($res == true)
                {
                    // Category berhasil di update
                    $_SESSION['update'] = "<div class='success'>Berhasil update kategori</div>";
                    header('location:'.SITE_URL.'admin/manage_category.php');
                }
                else
                {
                    // Gagal untuk update data
                    $_SESSION['update'] = "<div class='error'>Gagal update kategori</div>";
                    header('location:'.SITE_URL.'admin/manage_category.php');
                }
            }
    
    
    ?>

    </div>
</div>

<?php include('partials/footer.php') ?>