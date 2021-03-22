<?php include('partial_front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php SITE_URL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                // Menampilkan makanan
                $sql = "SELECT * FROM tbl_food WHERE active = 'Yes'";

                // Eksekusi query
                $res = mysqli_query($conn, $sql);

                // Hitung jumlah row
                $count = mysqli_num_rows($res);

                // Cek jumlah rows
                if($count > 0)
                {
                    // Ada makanan
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // dapatkan nilainya
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['imagine_name'];
                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                    
                                        // Cek ada gambar atau tidak
                                        if($image_name == "")
                                        {
                                            // Tidak ada gambar
                                            echo "<div class='error'>Tidak ada gambar</div>";
                                        }                      
                                        else
                                        {
                                            // Ada gambar
                                            ?>
                                            <img src="<?php SITE_URL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
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

                                    <a href="<?php echo SITE_URL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Pesan Sekarang</a>
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