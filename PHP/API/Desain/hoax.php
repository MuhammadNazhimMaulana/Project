<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">Daftar hoax</h1>
            </div>
            
            <h6>Hoax di Indonesia</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col">
                                                <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Link</th>
                                                    <th scope="col">Waktu</th>
                                                    <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                            $i = 1;
                                                            foreach($data_g  as $hasil)
                                                            {
                                                        ?>
                                                    <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $hasil['title']; ?></td>
                                                    <td><a href="<?= $hasil['url']; ?>">Link</a></td>
                                                    <td><?= $hasil['timestamp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php $i++; ?>
                                                        <?php 
                                                            }
                                                        ?>
                                                </tbody>
                                        </table>
                                </div>  
                            </div>  
                        </div>


<?php include 'Partials/footer.php'; ?>