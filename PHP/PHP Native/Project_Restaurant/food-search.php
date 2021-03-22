<?php include('partial_front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
        <?php 
            // Mendapatkan hasil keyword
            $search = $_POST['search'];
        
        ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 

                // Membuat query untuk mendapat makanan berdasarkan pencarian
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' or description LIKE '%$search%'";

                // Eksekusi query
                $res = mysqli_query($conn, $sql);

                // Menghitung baris
                $count = mysqli_num_rows($res);

                // Cek, apakah makanan sudah ada atau tidak
                if($count > 0)
                {
                    // Sudah ada makanan
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // Dapatkan detail
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['imagine_name'];
                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                        // Cek apakah ada nama gambar
                                        if($image_name == "")
                                        {
                                            // Tidak Ada gambar
                                            echo "<div class='error'>Tidak ada gambar</div>";
                                        }
                                        else
                                        {
                                            // Ada gambar
                                            ?>
                                            <img src="<?php echo SITE_URL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                            <?php 
                                        }
                                    
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">$<?php echo $price; ?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    // Tidak ada makanan
                    echo "<div class='error'>Tidak ada makanan</div>";
                }
            
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partial_front/footer.php'); ?>