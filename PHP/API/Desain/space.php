<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">News</h1>
            </div>
            
            <h6>Luar Angkasa</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col">
                                    <div class="col-md-10">
                                        <?php 
                                            foreach($news_s as $data)
                                            {
                                        ?>
                                        <div class="row NewsGrid">
                                            <div class="col-md-4 mt-5 mb-5">
                                                <img src="<?php echo $data->imageUrl ?>" alt="" style="width: 250px;  height: 250px;">
                                            </div>
                                            <div class="col-md-8 mt-5 mb-5">
                                                <h2 class="text-center mb-5"> <?php echo $data->title ?></h2>
                                                <h5>Deskripsi</h5>
                                                <p><?php echo $data->summary ?></p>
                                                <h6>Penulis: <?php echo $data->newsSite ?></h6>
                                                <h6>Tanggal Terbit: <?php echo $data->publishedAt ?></h6>
                                                <h6><a href="<?php echo $data->url ?>" role="button" class="btn btn-primary">Informasi</a></h6>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                </div>  
                            </div>
                        </div>



<?php include 'Partials/footer.php'; ?>