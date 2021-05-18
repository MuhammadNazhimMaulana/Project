<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper">
            <h3>Daftar Obat</h3><br>
            <form action="<?= base_url('/Admin/obat_admin'); ?>" method="post">
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
            <a href="<?= base_url('/Admin/nambah_obat'); ?>" class="btn btn-primary mt-3">Tambah Data</a> <br><br>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Tanggal Kadaluarsa</th>
                        <th scope="col">Perusahaan Pembuat</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (2 * ($currentPage - 1)); ?>
                    <?php foreach ($Data as $kolom) : ?>
                        <tr>
                            <th scope="kolom"><?= $i; ?></th>
                            <td><?= $kolom['nama_obat']; ?></td>
                            <td><?= $kolom['stok']; ?></td>
                            <td><?= $kolom['tanggal_kadaluarsa']; ?></td>
                            <td><?= $kolom['perusahaan']; ?></td>
                            <td><a href="<?= base_url('/Admin/edit_stok/' . $kolom['id_obat']); ?>" class="btn btn-warning mt-3">Edit</a></td>
                            <td><a href="<?= base_url('/Admin/delete_obat/' . $kolom['id_obat']); ?>" class="btn btn-danger mt-3" onclick="return confirm('Apakah anda yakin?');">Delete</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('obat', 'pagination'); ?>
        </div>
    </div>
</div>