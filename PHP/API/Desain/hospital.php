<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">Daftar Rumah Sakit</h1>
            </div>
            
            <h6>Rumah Sakit di Indonesia</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col">
                                                <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Wilayah</th>
                                                    <th scope="col">Provinsi</th>
                                                    <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                            $i = 1; 
                                                            foreach($data_h  as $hasil)
                                                            {
                                                        ?>
                                                    <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $hasil['name']; ?></td>
                                                    <td><?= $hasil['address']; ?></td>
                                                    <td><?= $hasil['region']; ?></td>
                                                    <td><?= $hasil['province']; ?></td>
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