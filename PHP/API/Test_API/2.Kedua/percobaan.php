<?php 

    $url_b = file_get_contents('https://api.npoint.io/99c279bb173a6e28359c/data');
    $data_b = json_decode($url_b, true);
    // var_dump($data_b);

?>


<main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">News</h1>
            </div>
            
            <h6>Google</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col">
                                    <div class="col-md-10">
                                        <?php 
                                            foreach($data_b as $data)
                                            {
                                        ?>
                                        <div class="row NewsGrid">
                                            <div class="col-md-8 mt-5 mb-5">
                                                <h2 class="text-center mb-5"><?= $data['arti']?></h2>
                                                <h5>Deskripsi</h5>
                                                <p><?= $data['ayat'] ?>></p>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                </div>  
                            </div>
                        </div>

