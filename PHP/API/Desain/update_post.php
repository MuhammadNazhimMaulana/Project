<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">Ubah Post</h1>
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
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $data_b[$id-1]['title']; ?>">
                    </div> <br>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" id="body" name="body" style="height: 100px"><?= $data_b[$id-1]['body']; ?></textarea>
                    </div>
                    <div class="mb-3">
                    <input type="hidden" name="id" value="<?= $data_b[$id-1]['id']; ?>>">  
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

                    <div class="row mt-5 mb-5">
                        <div class="mb-3">
                        
                    <?php 
                    
                    if (isset($_POST['submit']))
                    {
                        $url = "https://jsonplaceholder.typicode.com/posts/".$_GET['id'];
                        
                        $data_array = array(    
                            'title' => $_POST['title'],
                            'body' => $_POST['body']
                        );
                        
                        $data = http_build_query($data_array);
                        
                        $ch = curl_init();
                        
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        
                        $resp = curl_exec($ch);
                        
                        if($e = curl_error($ch)){
                            echo $e;
                        }
                        else{
                            ?>
                            <div class="mb-3">
                                <h1 class="text-center">Berhasil Menggunakan Put</h1>
                                <h6>Keterangan Sebagai berikut :</h6>
                            </div>
                        <?php
                            $decoded1 = json_decode($resp, true);
                            echo 'Perubahan pada judul menjadi '.$decoded1['title'] .'<br>';
                            echo 'Perubahan pada Body menjadi '.$decoded1['body'] .'<br>'.'<br>';
                        }
                        
                    }
                    ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'Partials/footer.php'; ?>