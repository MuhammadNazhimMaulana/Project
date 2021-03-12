<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Tambah Laporan</h1>
            <br><br>
            <form action="<?= base_url("admin/tambah_laporan_pengunjung"); ?>" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_transaksi">Sudah Bayar</label>
                        <select class="form-control" id="id_transaksi" name="id_transaksi">
                            <?php foreach ($bayar as $row2) : ?>
                                <option value="<?= $row2['id_transaksi'] ?>"><?= $row2['ket']; ?></option>
                            <?php endforeach; ?>
                        </select><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_admin">Nama Pembuat</label>
                    <select class="form-control" id="id_admin" name="id_admin">
                        <?php foreach ($admin as $row3) : ?>
                            <option value="<?= $row3['id_admin'] ?>"><?= $row3['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_bergabung">Periode Mulai</label>
                    <input type="date" class="form-control" id="tanggal_bergabung" placeholder="Tanggal di Awal Bulan" name="tanggal_bergabung">
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar">Periode Selesai</label>
                    <input type="date" class="form-control" id="tanggal_keluar" placeholder="Tanggal di Akhir Bulan" name="tanggal_keluar">
                </div>
                <div class="form-group">
                    <label for="total_transaksi">Total Transaksi</label>
                    <input type="number" class="form-control" id="total_transaksi" placeholder="Total Transaksi yang Sudah Terjadi" name="total_transaksi">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Laporan</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>