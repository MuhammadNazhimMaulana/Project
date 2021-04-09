<?php include 'corona.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Kebawah adalah bagian dimana seseoarang bisa melihat data dengan tambahan API -->

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1 class="text-center mt-5">Penyebaran Covid-19</h1>
            
            <h6>Global</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col-sm-4">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Positif</h5>
                                        <H1><?= $data['value']; ?></H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-04.png" alt="" height="100" width="100">
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
                                        <H1><?= $data_s['value']; ?></H1>
                                        <p class="card-text"><?= $decoded['data'][0]['last_name']; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-01.png" alt="" height="100" width="100">
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
                                        <H1>100000</H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-03.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>

            <h6>Indonesia</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col-sm-4">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Positif</h5>
                                        <H1>100000</H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-04.png" alt="" height="100" width="100">
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
                                        <H1>100000</H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-01.png" alt="" height="100" width="100">
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
                                        <H1>100000</H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-03.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>

            <h6><?php echo $data_h[0]["province"]; ?></h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col-sm-4">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Total Positif</h5>
                                        <H1>100000</H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-04.png" alt="" height="100" width="100">
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
                                        <H1>100000</H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-01.png" alt="" height="100" width="100">
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
                                        <H1>100000</H1>
                                        <p class="card-text">Orang</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="img/emoji-03.png" alt="" height="100" width="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>