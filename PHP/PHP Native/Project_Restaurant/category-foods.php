<?php include('partial_front/menu.php'); ?>

<?php 
    // Cek ada id atau tidak
    if(isset($_GET['category_id']))
    {
        // Sudah ada kategori id
        $category_id = $_GET['category_id'];

        // Dapatkan kategori berdasarkan ID
        $sql = "SELECT title FROM tbl_category WHERE id = $category_id";

        // Eksekusi query
        $res = mysqli_query($conn, $sql);

        // Dapatkan nilai dari database
        $row = mysqli_fetch_assoc($res);

        // Dapatkan title
        $category_title = $row['title'];
    }
    else
    {
        // Tidak ada kategori
        // Redirect
        header('location:'.SITE_URL);
    }

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $category_title; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                // Membuat query
                $sql2 = "SELECT * FROM tbl_food WHERE category_id = $category_id";

                // Ekseskusi query
                $res2 = mysqli_query($conn, $sql2);

                // count row yang ada
                $count2 = mysqli_num_rows($res2);

                // Cek apakah makanan ada atau tidak
                if($count2 > 0)
                {
                    // Ada makanan
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['imagine_name'];
                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">
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