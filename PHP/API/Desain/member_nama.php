<?php include 'API/api.php'; ?>
<?php include 'Partials/header.php'; ?>

<main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="row mt-5 mb-5">
                <h1 class="text-center mt-5">Keanggotaan Kami</h1>
            </div>
            
            <h6>Nama Anggota Kami</h6>
            <hr/>

            <div class="row mt-5 mb-5">
                    <div class="col">
                                                <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Actions</th>
                                                    <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                            $i = 1; 
                                                            foreach($decode['data'] as $hasil)
                                                            {
                                                        ?>
                                                    <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $hasil['first_name']; ?></td>
                                                    <td><?= $hasil['last_name']; ?></td>
                                                    <td><?= $hasil['email']; ?></td>
                                                    <td><a class="btn btn-primary" href="update_users.php?id=<?php echo $hasil['id']; ?>" role="button">Ubah</a></td>
                                                    <td><a class="btn btn-danger" href="delete_users.php?id=<?php echo $hasil['id']; ?>" role="button">Hapus</a></td>
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