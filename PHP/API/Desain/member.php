<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">Anggota Kami</h1>
            </div>
            
            <h6>Berita Anggota Kami</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col">
                                    <div class="col-md-10">
                                        <?php
                                            $i = 0; 
                                            foreach($data_b as $hasil)
                                            {
                                        ?>
                                        <div class="row NewsGrid mb-5">
                                            <div class="col-md-12 mt-5 mb-5">
                                                <h2 class="text-center mb-5"><?= $hasil['title']; ?></h2>
                                                <h5>Deskripsi</h5>
                                                <p><?= $hasil['body']; ?></p>
                                                <a class="btn btn-primary" href="update_post.php?id=<?php echo $hasil['id']; ?>" role="button">Ubah</a>
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