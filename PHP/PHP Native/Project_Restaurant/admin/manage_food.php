<?php include('partials/menu.php') ?>         

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }

            if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset ($_SESSION['unauthorize']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }
        ?>
<br><br>
                <!-- Tombol menambahkan Admin -->
                <a href="<?php echo SITE_URL;?>admin/add_food.php" class="btn-primary">Tambah Food</a>
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Judul</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        // Membuat query untuk mendapatkan data
                        $sql = "SELECT * FROM tbl_food";

                        // Eksekusi query
                        $res = mysqli_query($conn, $sql);

                        // Menghitung baris untuk cek ada makanan atau tidak
                        $count = mysqli_num_rows($res);

                        $sn = 1;

                        if($count > 0)
                        {
                            // Ada makanan dalam database
                            // Dapatkan data dan tampilkan
                            while($row = mysqli_fetch_assoc($res))
                            {
                                // Dapatkan dari kolom individual
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['imagine_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                                // Cek ada gambar atau tidak
                                                if($image_name == "")
                                                {
                                                    // Tidak ada gambar
                                                    echo "<div class='error'>Belum ada ga,bar</div>";
                                                }
                                                else
                                                {
                                                    // Ada gambar, tampilkan
                                                    ?>
                                                    <img src="<?php echo SITE_URL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                                    <?php 
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITE_URL; ?>admin/update_food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                            <a href="<?php echo SITE_URL; ?>admin/delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                        </td>
                                    </tr>
                                <?php 
                            }
                        }
                        else
                        {
                            // Tidak ada makanan
                            echo "<tr><td colspan='7' class='error'> Belum ada makanan </td></tr>";
                        }
                    ?>

                </table>
    </div>
</div>
        
<?php include('partials/footer.php') ?>
