<?php include('partial_front/menu.php'); ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 

                // Menampilkan semua kategori
                // Query sql
                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                // Eksekekusi query
                $res = mysqli_query($conn, $sql);

                // Hitung rows
                $count = mysqli_num_rows($res);

                // Cek apakah kategori ada atau tidak
                if($count > 0)
                {
                    // Ada kategori
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // Dapatkan valuenya
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITE_URL; ?>category-foods.php?category_id=<?php echo $id;  ?>">
                            <div class="box-3 float-container">
                            <?php 
                                if($image_name == "")
                                {
                                    // Tidak ada gambar
                                    echo "<div class='error'>Tidak ada gambar</div>";
                                }
                                else
                                {
                                    // Ada gambar
                                    ?>
                                    <img src="<?php echo SITE_URL; ?>images/category/<?php echo $image_name ?>" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                        
                        <?php
                    }
                }
                else
                {
                    // Kategori tidak ada
                    echo "<div class='error'>Tidak ada kategori</div>";
                }
            
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php include('partial_front/footer.php'); ?>