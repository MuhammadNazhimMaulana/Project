<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<!-- Jumbotron Awal -->

<section class="jumbotron text-center">
  <img src="img/Baru.png" alt="" width="200" class="rounded-circle img-thumbnail">
  <h1 class="display-4">Selamat Datang</h1>
  <p class="lead">Jadi di sini anda bisa melihat pemanfaatan API untuk mendapat informasi perkembangan Covid 19 dan berita lainnya.</p>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,32L34.3,48C68.6,64,137,96,206,138.7C274.3,181,343,235,411,256C480,277,549,267,617,234.7C685.7,203,754,149,823,112C891.4,75,960,53,1029,80C1097.1,107,1166,181,1234,186.7C1302.9,192,1371,128,1406,96L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
</section>

<!-- Jumbotron Akhir -->

<!-- Awal About -->
<section id="about">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <h2>Covid 19</h2>
      </div>
    </div>
    <div class="row justify-content-center fs-5 text-center">
      <div class="col-md-4">
        <p>Merupakan peristiwa yang telah terjadi sejak lama dan masih ada hingga sekarang.</p>
      </div>
      <div class="col-md-4">
        <p>Silakan klik tombol Covid pada Navbar untuk lebih jelasnya atau klik tombol dibawah.</p>
        <div class="row justify-content-center fs-5 text-center">
          <div class="col-md-4">
            <a class="btn btn-primary" href="covid.php" role="button">Cek</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,128L34.3,122.7C68.6,117,137,107,206,101.3C274.3,96,343,96,411,96C480,96,549,96,617,122.7C685.7,149,754,203,823,202.7C891.4,203,960,149,1029,154.7C1097.1,160,1166,224,1234,208C1302.9,192,1371,96,1406,48L1440,0L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
          </section>
          <!-- Awal About -->
          
          <!-- Awal project -->
          <section id="project">
            <div class="container">
              <div class="row text-center mb-3">
                <div class="col">
                  <h2>Berita yang Tersedia</h2>
                </div>
              </div>
              <div class="row justify-content-evenly">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img src="<?php echo $news->articles[0]->urlToImage ?>" class="card-img-top" alt="Project 1">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img src="<?php echo $news->articles[1]->urlToImage ?>" class="card-img-top" alt="Project 1">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <img src="<?php echo $news->articles[2]->urlToImage ?>" class="card-img-top" alt="Project 1">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mt-5 mb-3">
                  <div class="card">
                    <img src="<?php echo $news->articles[3]->urlToImage ?>" class="card-img-top" alt="Project 1">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mt-5 mb-3">
                  <div class="card">
                    <img src="<?php echo $news->articles[4]->urlToImage ?>" class="card-img-top" alt="Project 1">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,64L34.3,74.7C68.6,85,137,107,206,144C274.3,181,343,235,411,229.3C480,224,549,160,617,112C685.7,64,754,32,823,42.7C891.4,53,960,107,1029,149.3C1097.1,192,1166,224,1234,202.7C1302.9,181,1371,107,1406,69.3L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
</section>
          <!-- Akhir project -->
          
          <!-- Awal Contact -->
          <section id="contact">
            <div class="container">
              <div class="row text-center mb-3">
                <div class="col">
                  <h2>Hubungi saya</h2>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-6">
                <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div> <br>
                <div class="mb-4">
                    <label for="job" class="form-label">Keluhan</label>
                    <input type="text" class="form-control" id="job" name="job">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
                </form>

                <?php
                      if (isset($_POST['submit']))
                      {
                          $url = "https://reqres.in/api/users";
                          
                          $data_array = array(    
                              'name' => $_POST['name'],
                              'job' => $_POST['job']
                          );
                          
                          $data = http_build_query($data_array);
                          
                          $ch = curl_init();
                          
                          curl_setopt($ch, CURLOPT_URL, $url);
                          curl_setopt($ch, CURLOPT_POST, true);
                          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          
                          $resp = curl_exec($ch);
                          
                          if($e = curl_error($ch)){
                              echo $e;
                          }
                          else{
                              $decoded = json_decode($resp, true);
                              // print_r($decoded);

                              echo 'Nama yang sudah anda masukkan adalah '.$decoded['name'].'<br>';
                              echo 'Keluhan Anda saat adalah '.$decoded['job']. '<br>';
                              echo 'Id yang anda peroleh dari proses ini adalah '.$decoded['id']. '<br>' ;
                          }
                          
                      }

                    ?>
                </div>
              </div>
            </div>
            
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,224L34.3,229.3C68.6,235,137,245,206,224C274.3,203,343,149,411,149.3C480,149,549,203,617,202.7C685.7,203,754,149,823,149.3C891.4,149,960,203,1029,218.7C1097.1,235,1166,213,1234,181.3C1302.9,149,1371,107,1406,85.3L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
          </section>
          <!-- Akhir Contact -->

<?php include 'Partials/footer.php'; ?>


