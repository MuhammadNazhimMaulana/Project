<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-11 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper">
            <h3>Daftar Data Pasien</h3><br>
            <form action="<?= base_url('/Users/jadwal'); ?>" method="post">
                <table class="table table-striped">
                    <tr>
                        <td>
                            Cari Data
                        </td>
                        <td>
                            <input type="text" class="form-control" name="cari" placeholder="Silakan Cari Data Berdasarkan Nama">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success" name="submit">Cari</button>
                        </td>
                    </tr>
                </table>
            </form>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Jadwal Periksa</th>
                        <th scope="col">Nama Pemeriksa</th>
                        <th scope="col">Nama Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Data as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['firstname']; ?></td>
                            <td><?= $row['jadwal_periksa']; ?></td>
                            <td><?= $row['nama_dokter']; ?></td>
                            <td><?= $row['nama_ruang']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>