<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<!-- Kebawah adalah bagian dimana seseoarang bisa melihat data dengan tambahan API -->

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">Penyebaran Covid-19</h1>
            </div>
            
            <h6>Global</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col-sm-4">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Positif</h5>
                                        <H1><?= $data['result']['confirmed']; ?></H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/expression/2.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                    <div class="col-sm-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Sembuh</h5>
                                        <H1><?= $data['result']['recovered']; ?></H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/expression/1.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                    <div class="col-sm-4">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Meninggal</h5>
                                        <H1><?= $data['result']['deaths']; ?></H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/expression/3.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>


                <h6>Indonesia pada <?= $data_l['date'] ?></h6>
                <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col-sm-4">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Positif</h5>
                                        <H1><?= $data_idn['result']['2021-03-22']['confirmed']; ?></H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/expression/2.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                    <div class="col-sm-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Sembuh</h5>
                                        <H1><?= $data_idn['result']['2021-03-22']['recovered']; ?></H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/expression/1.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                    <div class="col-sm-4">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Meninggal</h5>
                                        <H1><?= $data_idn['result']['2021-03-22']['deaths']; ?></H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/expression/3.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="row mt-5 mb-5">
                      <div class="col sm-2">
                          <a href="hospital.php" role="button" class="btn btn-primary">Info Rumah Sakit</a>
                          <a href="hoax.php" role="button" class="btn btn-danger">Hoax</a>
                      </div>
                  </div>
            <hr/>
        </div>
    </main>

<?php include 'Partials/footer.php'; ?>