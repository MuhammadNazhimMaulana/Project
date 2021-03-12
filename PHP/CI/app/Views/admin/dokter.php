<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper">
            <h3>Daftar Dokter</h3>
            <form action="<?= base_url('/Admin/dokter'); ?>" method="post">
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
            <a href="<?= base_url('/Admin/nambah'); ?>" class="btn btn-primary mt-3">Tambah Data</a> <br><br>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama/Spesialis</th>
                        <th scope="col">Rumah Sakit</th>
                        <th scope="col">Spesialis</th>
                        <th scope="col">Jadwal Hari</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Klinik</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (2 * ($currentPage - 1)); ?>
                    <?php foreach ($Data as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nama_dokter']; ?></td>
                            <td><?= $row['rumah_sakit']; ?></td>
                            <td><?= $row['spesialis']; ?></td>
                            <td><?= $row['jadwal_hari']; ?></td>
                            <td><?= $row['jadwal_waktu']; ?></td>
                            <td><?= $row['jenis_klinik']; ?></td>
                            <td><a href="<?= base_url('/Admin/edit/' . $row['id_dokter']); ?>" class="btn btn-warning mt-3">Edit</a></td>
                            <td><a href="<?= base_url('/Admin/delete/' . $row['id_dokter']); ?>" class="btn btn-danger mt-3" onclick="return confirm('Apakah anda yakin?');">Delete</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('dokter', 'pagination'); ?>
        </div>
    </div>
</div>