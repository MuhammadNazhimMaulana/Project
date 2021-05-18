<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-11 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper">
            <h3>Daftar Data Pembelian Obat</h3><br>
            <form action="<?= base_url('/Users/beli_obat'); ?>" method="post">
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
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Nama Kasir</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Jumlah Beli</th>
                        <th scope="col">Jumlah Bayar</th>
                        <th scope="col">Bukti Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Data as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['firstname']; ?></td>
                            <td><?= $row['nama_kasir']; ?></td>
                            <td><?= $row['nama_obat']; ?></td>
                            <td><?= $row['jumlah_beli']; ?></td>
                            <td>Rp. <?= $row['jumlah_bayar']; ?></td>
                            <td><img src="<?= base_url("/IMG/$row[bukti_bayaran]"); ?>" alt="" class="bukti_bayaran" width="100"></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>