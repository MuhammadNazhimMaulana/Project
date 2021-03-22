<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Tambah Food</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">
        
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" id="title" placeholder="Judul makanan">
                </td>
            </tr>

            <tr>
                <td>Deskripsi: </td>
                <td>
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Deskripsi Makanan"></textarea>
                </td>
            </tr>

            <tr>
                <td>Harga: </td>
                <td>
                   <input type="number" name="price" id="price">
                </td>
            </tr>

            <tr>
                <td>Image: </td>
                <td>
                   <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                   <select name="category">

                        <?php 
                            // Membuat code php untuk menaampilkan category
                            // Membuat sql
                            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                            // Eksekusi query
                            $res = mysqli_query($conn, $sql);

                            // Menghitung rows
                            $count = mysqli_num_rows($res);

                            // IF countnya lebih besar daripada 0
                            if($count > 0)
                            {
                                // Ada kategori
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    // Dapatkan nilainya 
                                    $id = $row['id'];
                                    $title = $row['title'];

                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                // Tidak ada datanya
                                ?>
                                <option value="0">Tidak ada kategori</option>
                                <?php 
                            }

                            // Menampilkan Dropdown
                        ?>

                   </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" id="submit" value="Add food" class="btn-secondary">
                </td>
            </tr>

        </table>

        </form>

        <?php 

            // Cek tombol diklik atau tidak
            if(isset($_POST['submit']))
            {
                // Tambahkan makanan dalam database
                // echo "clik";

                // Dapatkan data dari form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                // Cek yang radio button
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; // Defaultnya
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; // Defaultnya
                }

                // Upload gambar
                // Cek ada gambar yang diupload
                if(isset($_FILES['image']['name']))
                {
                    // Dapatkan detailnya
                    $image_name = $_FILES['image']['name'];

                    // Cek gambarnya di pilih atau tidak
                    if($image_name != "")
                    {
                        // Gambar dipilih
                        // Rename gambar
                        $ext = end(explode('.', $image_name));

                        // Buat nama baru gambarnya
                        $image_name = "Food_name_".rand(0000, 9999).".".$ext; // Nama gambar baru

                        // Upload gambar
                        // Dapatkan path yang baru
                        // Sumber path

                        $src = $_FILES['image']['tmp_name'];

                        // Destinasi gambar yang akan dituju
                        $dst = "../images/food/".$image_name;

                        // Upload gambar makanan
                        $upload = move_uploaded_file($src, $dst);

                        // Cek gambar di upload atau tidak sama sekali
                        if($upload == false)
                        {
                            // gagal upload gambar
                            // Redirect ke halaman management food dan akhiri proses
                            $_SESSION['upload'] = "<div class'success'>Gagal upload gambar</div>";
                            header('location:'.SITE_URL.'admin/add_food.php');
                            die();
                        }
                    }
                }
                else
                {
                    $image_name = ""; // Nilai default
                }

                // Masukkan datanya ke database
                // Membuat query 
                // Untuk number tidak perlu ada petik 1
                $sql2 = " INSERT INTO tbl_food SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    imagine_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                // Eksekusi query
                $res2 = mysqli_query($conn, $sql2);

                // Cek data diinsert
                // Kembali ke manage food dan ada pesan

                if($res2 == true)
                {
                    // Insert data berhasil
                    $_SESSION['add'] = "<div class='success'>Berhasil menambah Food</div>";
                    header('location:'.SITE_URL.'admin/manage_food.php');
                }
                else
                {
                    // Gagal memasukkan data
                    $_SESSION['add'] = "<div class='error'>Gagal menambah Food</div>";
                    header('location:'.SITE_URL.'admin/manage_food.php');
                }
                
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php')?>