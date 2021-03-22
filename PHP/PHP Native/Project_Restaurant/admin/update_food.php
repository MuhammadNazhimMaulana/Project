<?php include('partials/menu.php'); ?>

<?php 
    // Cek id ada atau tidak
    if(isset($_GET['id']))
    {
        // Dapatkan detail
        $id = $_GET['id'];

        // Query untuk mendapatkan makanan yang dipilih
        $sql2 = "SELECT * FROM tbl_food WHERE id = $id";

        // Ekseskusi query
        $res2 = mysqli_query($conn, $sql2);

        // Dapatkan value berdasarkan query yang dieksekusi
        $row2 = mysqli_fetch_assoc($res2);

        // Dapatkan nilai yang individu
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['imagine_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    }
    else
    {
        // Redirect lagi ke awal
        header('location:'.SITE_URL.'admin/manage_food.php');
    }

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Makanan</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">
        
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Decription: </td>
                <td>
                    <textarea name="description" cols="30" rows="5" ><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            // Tidak Ada gambar
                            echo "<div class='error'>Tidak ada gambar</div>";
                        }
                        else
                        {
                            // Ada gambar
                            ?>
                            <img src="<?php echo SITE_URL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Pilih Gambar baru: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">

                        <?php 
                            // Query untuk dapat kategori
                            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                            // Eksekusi query
                            $res = mysqli_query($conn, $sql);

                            // Hitung rows
                            $count = mysqli_num_rows($res);

                            // Cek kategorinya
                            if($count > 0)
                            {
                                // Catgory ada
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                                    // echo "<option value='$category_id'>$category_title</option>";
                                    ?> 
                                    <option <?php if($current_category == $category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php 
                                }
                            }
                            else
                            {
                                // Category tidak ada
                                echo "<option value-'0'>Category tidak ada</option>";
                            }
                        ?>
                        <option value="0">Test Category</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                    <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>

        </table>

        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                // echo "Terklik";

                // Dapatkan semua detailnya
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                // Upload gambar jika dipilih
                // Cek tombol update diklik
                if(isset($_FILES['image']['name']))
                {
                    // Upload di kilk
                    $image_name = $_FILES['image']['name'];

                    // Cek filenya ada atau tidak
                    if($image_name != "")
                    {
                        // Ada image
                        // Ganti nama
                        $ext = end(explode('.', $image_name)); // Dapatkan ekstensi

                        $image_name = "Food_Name_".rand(0000, 9999).'.'.$ext; // Nama gambar akan diganti

                        // Dapatkan sumber path
                        $src_path = $_FILES['image']['tmp_name']; // Sumber path
                        $dest_path = "../images/food/".$image_name; // Destinasi tujuan

                        // Upload gambar
                        $upload = move_uploaded_file($src_path, $dest_path);

                        // Cek gambar di upload atau tidak
                        if($upload == false)
                        {
                            // Gagal upload
                            $_SESSION['upload'] = "<div class='error'>Gagal upload gambar</div>";

                            // Redirect
                            header('location:'.SITE_URL.'admin/manage_food.php');

                            // Stop prosesnya
                            die();
                        }
                        // Hapus gambar sekarang
                        if($current_image != "")
                        {
                            // Ada gambar yang sekarang
                            // Hapus gambar yang sekarang
                            $remove_path = "../images/food/".$current_image;

                            $remove = unlink($remove_path);

                            // Cek gambar sudah di hapus
                            if($remove == false)
                            {
                                // Gagal menghapus gambar
                                $_SESSION['remove_failed'] = "<div class='error'>Gagal upload gambar</div>";

                                // Redirect
                                header('location:'.SITE_URL.'admin/manage_food.php');

                                // Stop porsesnya
                                die();
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

                // Update food di database
                $sql3 = "UPDATE tbl_food SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    imagine_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
                ";

                // Eksekusi query
                $res3 = mysqli_query($conn, $sql3);

                // Cek query dieksekusi atau tidak
                if($res3 == true)
                {
                    // Query tereksekusi
                    $_SESSION['update'] = "<div class='success'>Berhasil update Food</div>";
                    header('location:'.SITE_URL.'admin/manage_food.php');
                }
                else
                {
                    // Query tidak tereksekusi
                    $_SESSION['update'] = "<div class='error'>Gagal update Food</div>";
                    header('location:'.SITE_URL.'admin/manage_food.php');
                }

            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>