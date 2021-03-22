<?php include('partials/menu.php') ?>
        
        
        <!-- Section konten utama Start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>

<?php 
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login']; // Memunculkan pesan session
            unset($_SESSION['login']); //Menghilangkan pesan session
        }
?>

                <div class="col-4 text-center">
                    <?php 
                        // Query
                        $sql = "SELECT * FROM tbl_category";

                        // Eksekusi
                        $res = mysqli_query($conn, $sql);

                        // Hitung row
                        $count = mysqli_num_rows($res);
                    
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br>
                    Kategori
                </div>

                <div class="col-4 text-center">
                <?php 
                        // Query
                        $sql2 = "SELECT * FROM tbl_food";

                        // Eksekusi
                        $res2 = mysqli_query($conn, $sql2);

                        // Hitung row
                        $count2 = mysqli_num_rows($res2);
                    
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br>
                    Makanan
                </div>

                <div class="col-4 text-center">
                <?php 
                        // Query
                        $sql3 = "SELECT * FROM tbl_order";

                        // Eksekusi
                        $res3 = mysqli_query($conn, $sql3);

                        // Hitung row
                        $count3 = mysqli_num_rows($res3);
                    
                    ?>
                    <h1><?php echo $count3; ?></h1>
                    <br>
                    Total Pesanan
                </div>

                <div class="col-4 text-center">

                    <?php 
                        // Membuat sql
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status = 'Delivered'";

                        // Eksekusi query 
                        $res4 = mysqli_query($conn, $sql4);

                        // Dapatkan nilai
                        $rows4 = mysqli_fetch_assoc($res4);

                        // Dapatkan total keuntungan
                        $total_revenue  = $rows4['Total'];
                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br>
                    Keuntungan
                </div>
                <div class="clearfix">

                </div>
            </div>
        </div>
        <!-- Section konten utama End -->

<?php include('partials/footer.php') ?>