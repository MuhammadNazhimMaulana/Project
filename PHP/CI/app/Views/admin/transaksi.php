<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-11 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper">
            <h3>Daftar Data Transaksi</h3><br>
            <form action="<?= base_url('/Admin/pembelian_obat'); ?>" method="post">
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
            <a href="<?= base_url('/Admin/tambah_beli'); ?>" class="btn btn-primary mt-3">Tambah Data</a> <br><br>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Jumlah Beli</th>
                        <th scope="col">Jumlah Bayar</th>
                        <th scope="col">Bukti Bayar</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Data as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nama_obat']; ?></td>
                            <td><?= $row['jumlah_beli']; ?></td>
                            <td><?= $row['jumlah_bayar']; ?></td>
                            <td><?= $row['bukti_bayar']; ?></td>
                            <td><a href="<?= base_url('/Admin/edit_pendaftaran/' . $row['id_pembelian']); ?>" class="btn btn-warning mt-3">Edit</a></td>
                            <td><a href="<?= base_url('/Admin/delete_pendaftaran/' . $row['id_pembelian']); ?>" class="btn btn-danger mt-3" onclick="return confirm('Apakah anda yakin?');">Delete</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>