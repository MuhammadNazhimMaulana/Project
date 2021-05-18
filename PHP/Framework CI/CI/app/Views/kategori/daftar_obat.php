<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper">
            <h3>Daftar Obat</h3><br>
            <form action="<?= base_url('/Users/daftar_obat'); ?>" method="post">
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
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Tanggal Kadaluarsa</th>
                        <th scope="col">Perusahaan Pembuat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (2 * ($currentPage - 1)); ?>
                    <?php foreach ($obat as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nama_obat']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td><?= $row['tanggal_kadaluarsa']; ?></td>
                            <td><?= $row['perusahaan']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('obat', 'pagination'); ?>
        </div>
    </div>
</div>