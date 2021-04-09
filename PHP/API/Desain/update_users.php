<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">Ubah Anggota</h1>
            </div>
                    <?php
                            if(isset($_GET['id']))
                            {
                                // Dapatkan detail yang lain
                                // echo "Mendapat Data";
                                $id = $_GET['id'];
                            }
                    ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $decode['data'][$id-6]['first_name']; ?>">
                    </div> <br>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $decode['data'][$id-6]['last_name']; ?>">
                    </div> <br>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $decode['data'][$id-6]['email']; ?>">
                    </div> <br>
                    <div class="mb-3">
                    <input type="hidden" name="id" value="<?= $decode['data'][$id-6]['id']; ?>>">  
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                    <div class="row mt-5 mb-5">
                        <div class="mb-3">
                        
                    <?php 
                    
                    if (isset($_POST['submit']))
                    {
                        $url = "https://reqres.in/api/users/".$_GET['id'];
                        
                        $data_array = array(    
                            'first_name' => $_POST['first_name'],
                            'last_name' => $_POST['last_name'],
                            'email' => $_POST['email']
                        );
                        
                        $data = http_build_query($data_array);
                        
                        $ch = curl_init();
                        
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        
                        $resp = curl_exec($ch);
                        
                        if($e = curl_error($ch)){
                            echo $e;
                        }
                        else{
                            ?>
                            <div class="mb-3">
                                <h1 class="text-center">Berhasil Menggunakan Patch</h1>
                                <h6>Keterangan Sebagai berikut :</h6>
                            </div>
                        <?php
                            $decoded1 = json_decode($resp, true);
                            echo 'Perubahan pada first_name menjadi '.$decoded1['first_name'] .'<br>';
                            echo 'Perubahan pada last_name menjadi '.$decoded1['last_name'] .'<br>';
                            echo 'Perubahan pada email menjadi '.$decoded1['email'] .'<br>'.'<br>';
                        }
                        
                    }
                    ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'Partials/footer.php'; ?>