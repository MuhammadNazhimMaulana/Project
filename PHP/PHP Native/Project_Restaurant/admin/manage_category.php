<?php include('partials/menu.php') ?>         

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add'])) // Cek session 
            {
                echo $_SESSION['add']; // Menampilkan pesan session
                unset ($_SESSION['add']); //menghapus pesan session
            }

            if(isset($_SESSION['remove'])) // Cek session 
            {
                echo $_SESSION['remove']; // Menampilkan pesan session
                unset ($_SESSION['remove']); //menghapus pesan session
            }

            if(isset($_SESSION['delete'])) // Cek session 
            {
                echo $_SESSION['delete']; // Menampilkan pesan session
                unset ($_SESSION['delete']); //menghapus pesan session
            }

            if(isset($_SESSION['no_category'])) // Cek session 
            {
                echo $_SESSION['no_category']; // Menampilkan pesan session
                unset ($_SESSION['no_category']); //menghapus pesan session
            }

            if(isset($_SESSION['update'])) // Cek session 
            {
                echo $_SESSION['update']; // Menampilkan pesan session
                unset ($_SESSION['update']); //menghapus pesan session
            }

            if(isset($_SESSION['upload'])) // Cek session 
            {
                echo $_SESSION['upload']; // Menampilkan pesan session
                unset ($_SESSION['upload']); //menghapus pesan session
            }

            if(isset($_SESSION['failed_remove'])) // Cek session 
            {
                echo $_SESSION['failed_remove']; // Menampilkan pesan session
                unset ($_SESSION['failed_remove']); //menghapus pesan session
            }
        ?>
        <br><br>
        
                <!-- Tombol menambahkan Admin -->
                <a href="<?php echo SITE_URL; ?>admin/add_category.php" class="btn-primary">Tambah Kategori</a>
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                <?php 
                
                    // Query untuk semua kategori dalam database
                    $sql = "SELECT * FROM tbl_category";

                    // Eksekusi query
                    $res = mysqli_query($conn, $sql);

                    // Menghitung Baris
                    $count = mysqli_num_rows($res);

                    // Membuat nomor serial yang valid 
                    $sn = 1;

                    // Cek ada data di dalam database
                    if($count > 0)
                    {
                        // Ada databasenya disini
                        // Ambil dan tampilkan
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $title; ?></td>

                                    <td>
                                        <?php 
                                            // Cek nama gambar valid
                                            if($image_name != "")
                                            {
                                                // Tampilkan gambar
                                                ?>
                                                <img src="<?php echo SITE_URL; ?>images/category/<?php echo $image_name?>" width="100px">
                                                <?php
                                            }
                                            else
                                            {
                                                // Tampilkan pesan
                                                echo "<div class='error'>Tidak ada Gambar</div>";
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITE_URL;?>admin/update_category.php?id=<?php echo $id;?>" class="btn-secondary">Update Category</a>
                                        <a href="<?php echo SITE_URL;?>admin/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                                    </td>
                                </tr>

                            <?php
                        }
                    }
                    else
                    {
                        // Tidak ada database
                        ?>

                        <tr>
                            <td colspan="6"><div class="error">Tidak ada Kategory</div></td>
                        </tr>

                        <?php
                    }

                ?>

                </table>
    </div>
</div>
        
<?php include('partials/footer.php') ?>
