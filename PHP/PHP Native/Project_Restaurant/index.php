<?php include('partial_front/menu.php'); ?>
    
    <!-- Pencarian Food Mulai disini -->
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo SITE_URL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Mencari Makanan">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <!-- Pencarian Food  Selesai disini -->

    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    
    ?>
    
    <!-- Kategori Mulai disini -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Makanan</h2>

            <?php 
                // Membuat query 
                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3";

                // Eksekusi query
                $res = mysqli_query($conn, $sql);

                // Menghitung rows appakah kategorinya ada
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    // Ada kategori
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // Dapatkan nilainya, id, title, gambar
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="<?php SITE_URL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                <?php 
                                    if($image_name == "")
                                    {
                                        // Tunjukkan pesan
                                        echo "<div class='error'>Tidak ada gambar</div>";
                                    }
                                    else
                                    {
                                        // Ada gambarnya 
                                        ?>
                                        <img src="<?php echo SITE_URL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve">
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
                    // Tidak ada kategori
                    echo "<div class='error'>Tidak ada kategori</div>";
                }

            ?>

            <div class="clearfix">

            </div>
        </div>
    </section>
    <!-- Kategori  Selesai disini -->
    
    <!-- Menu Makanan Mulai disini -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu Makanan</h2>

            <?php 
            
                // Mendapatkan data makanan dari database
                // Query sql
                $sql2 = "SELECT * FROM tbl_food WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";

                // Eksekusi query
                $res2 = mysqli_query($conn, $sql2);

                // Hitung data
                $count2 = mysqli_num_rows($res2);

                // Cek ada data makanan atau tidak sama sekali
                if($count2 > 0)
                {
                    // Ada makanan
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        // Dapatkan datanya
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['imagine_name'];
                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                        // Cek ada gambar atau tidak
                                        if($image_name == "")
                                        {
                                            // Gambar tidak ada
                                            echo "<div class='error'>Gambar tidak tersedia</div>";
                                        }
                                        else
                                        {
                                            // Gambar ada
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

               <div class="clearfix">
            </div>
        </div>
    </section>
    <!-- Menu Makanan  Selesai disini -->
    
<?php include('partial_front/footer.php'); ?>
    
