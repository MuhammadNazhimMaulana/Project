<?php include('partial_front/menu.php'); ?>

<?php 
    // Cek ada food id atau tidak
    if(isset($_GET['food_id']))
    {
        // Dapatkan id makanan dan detailnya
        $food_id = $_GET['food_id'];

        // Dapatkan detail dari makanan yang dipilih
        $sql = "SELECT * FROM tbl_food WHERE id = $food_id";

        // Eksekusi query
        $res = mysqli_query($conn, $sql);

        // Hitung rows yang ada
        $count = mysqli_num_rows($res);

        // Cek data tersedia atau tidak sama sekali
        if($count == 1)
        {
            // ada datanya
            // Dapatkan seluruh data
            $row = mysqli_fetch_assoc($res);

            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['imagine_name'];
        }
        else
        {
            // Tidak ada datanya
            // Redirect lagi
            header('location:'.SITE_URL);
        }
    }
    else
    {
        // Redirect kembali
        header('location:'.SITE_URL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            // Cek ada gambar atau tidak
                            if($image_name == "")
                            {
                                // Tidak ad gambar
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
                        <h3><?php echo $title;  ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price;  ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend><br>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    
                    <br><br>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            
            <?php 
            
                    // Cek apakah tombol submit di tekan
                    if(isset($_POST['submit']))
                    {
                        // Dapatkan semua detail

                        $food = $_POST['food'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];

                        $total = $price * $qty; // Total = price * qty

                        $order_date = date("Y-m-d h:i:sa"); //tanggal pesan

                        $status = "Ordered"; // Ordered, On-delivery, Delivered, Canceled

                        $customer_name = $_POST['full_name'];
                        $customer_contact = $_POST['contact'];
                        $customer_email = $_POST['email'];
                        $customer_address = $_POST['address'];

                        // Simpan data
                        // Membuat sql untuk simpan data
                        $sql2 = "INSERT INTO tbl_order SET
                            food = '$food',
                            price = $price,
                            qty = $qty,
                            total = $total,
                            order_date = '$order_date',
                            status = '$status',
                            customer_name = '$customer_name',
                            customer_contact = '$customer_contact',
                            customer_email = '$customer_email',
                            customer_address = '$customer_address'
                        ";
                        
                        // Eksekusi query
                        $res2 = mysqli_query($conn, $sql2);

                        // Cek query tereksekusi atau tidak
                        if($res2 == true)
                        {
                            // Query tereksekusi
                            $_SESSION['order'] = "<div class='success text-center'>Berhasil Menambahkan Order</div>";

                            // Redirect
                            header('location:'.SITE_URL);
                        }
                        else
                        {
                            // Gagal mengeksekusi query
                            $_SESSION['order'] = "<div class='error text-center'>Gagal Menambahkan Order</div>";
    
                            // Redirect
                            header('location:'.SITE_URL);
                        }
                    }
            
            ?>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

<?php include('partial_front/footer.php'); ?>