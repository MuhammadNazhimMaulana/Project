<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper">
            <h3>Daftar Ruang</h3>
            <form action="<?= base_url('/Admin/ruang'); ?>" method="post">
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
            <a href="<?= base_url('/Admin/nambah_ruang'); ?>" class="btn btn-primary mt-3">Tambah Data</a> <br><br>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (2 * ($currentPage - 1)); ?>
                    <?php foreach ($Data as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nama_ruang']; ?></td>
                            <td><?= $row['kapasitas']; ?></td>
                            <td><a href="<?= base_url('/Admin/edit_ruang/' . $row['id_ruang']); ?>" class="btn btn-warning mt-3">Edit</a></td>
                            <td><a href="<?= base_url('/Admin/delete_ruang/' . $row['id_ruang']); ?>" class="btn btn-danger mt-3" onclick="return confirm('Apakah anda yakin?');">Delete</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('ruang', 'pagination'); ?>
        </div>
    </div>
</div>