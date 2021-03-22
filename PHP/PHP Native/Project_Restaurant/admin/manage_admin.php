<?php include('partials/menu.php') ?>         

        <!-- Section konten utama Start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br>

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; // Memunculkan pesan session
                        unset($_SESSION['add']); //Menghilangkan pesan session
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; // Memunculkan pesan session delete
                        unset($_SESSION['delete']); //Menghilangkan pesan session delete
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; // Memunculkan pesan session update
                        unset($_SESSION['update']); //Menghilangkan pesan session update
                    }

                    if(isset($_SESSION['user_not_found']))
                    {
                        echo $_SESSION['user_not_found']; // Memunculkan pesan session user_not_found
                        unset($_SESSION['user_not_found']); //Menghilangkan pesan session user_not_found
                    }

                    if(isset($_SESSION['password_tidak_cocok']))
                    {
                        echo $_SESSION['password_tidak_cocok']; // Memunculkan pesan session password_tidak_cocok
                        unset($_SESSION['password_tidak_cocok']); //Menghilangkan pesan session password_tidak_cocok
                    }

                    if(isset($_SESSION['berubah_query']))
                    {
                        echo $_SESSION['berubah_query']; // Memunculkan pesan session berubah_query
                        unset($_SESSION['berubah_query']); //Menghilangkan pesan session berubah_query
                    }

                    if(isset($_SESSION['fail_query']))
                    {
                        echo $_SESSION['fail_query']; // Memunculkan pesan session fail_query
                        unset($_SESSION['fail_query']); //Menghilangkan pesan session fail_query
                    }
                ?>
                <br><br><br>

                <!-- Tombol menambahkan Admin -->
                <a href="add_admin.php" class="btn-primary">Tambah Admin</a>
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    
                    <?php 
                        //query select untuk mengambil data
                        $sql = "SELECT * FROM tbl_admin";

                        //Ekseskusi query
                        $res = mysqli_query($conn, $sql);

                        //Cek query dieksekusi atau tidak
                        if($res==TRUE)
                        {
                            //Menghitung baris
                            $count = mysqli_num_rows($res); //function untuk menghtitung baris

                            $sn = 1; //Variabel

                            //Cek jumlah baris
                            if($count>0)
                            {
                                //Ada data
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    // Looping untuk ambil data
                                    // Ambil data

                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];

                                    //Menunjukkan hasil dari tabel
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $full_name ?></td>
                                        <td><?php echo $username ?></td>
                                        <td>
                                            <a href="<?php echo SITE_URL; ?>admin/update_password.php?id=<?php echo $id ?>" class="btn-primary">Ganti Sandi</a>
                                            <a href="<?php echo SITE_URL; ?>admin/update_admin.php?id=<?php echo $id ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITE_URL; ?>admin/delete_admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                //Tidak ada data
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
        <!-- Section konten utama End -->
        
<?php include('partials/footer.php') ?>
