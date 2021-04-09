<?php 

    $url_b = file_get_contents('https://bioskop-api-zahirr.herokuapp.com/api/now-playing');
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
                                            foreach($data_b['result']['hasil'] as $data)
                                            {
                                        ?>
                                        <div class="row NewsGrid">
                                            <div class="col-md-4 mt-5 mb-5">
                                                <img src="<?= $data['img'] ?>" alt="" style="width: 250px;  height: 250px;">
                                            </div>
                                            <div class="col-md-8 mt-5 mb-5">
                                                <h2 class="text-center mb-5"><?= $data['title']?></h2>
                                                <h5>Deskripsi</h5>
                                                <p><?= $data['url'] ?>></p>
                                            </div>
                                        </div>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                </div>  
                            </div>
                        </div>

