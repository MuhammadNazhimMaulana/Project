<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Tambah Pembayaran</h1>
            <br><br>
            <form action="<?= base_url("admin/tambah_bayar"); ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group">
                        <label for="id">Nama Pasien</label>
                        <select class="form-control" id="id" name="id">
                            <?php foreach ($user as $row3) : ?>
                                <option value="<?= $row3['id'] ?>"><?= $row3['firstname']; ?></option>
                            <?php endforeach; ?>
                        </select><br>
                    </div>
                </div>
                <label for="id_pasien">Jadwal</label>
                <select class="form-control" id="id_pasien" name="id_pasien">
                    <?php foreach ($pasien as $row2) : ?>
                        <option value="<?= $row2['id_pasien'] ?>"><?= $row2['jadwal_periksa']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <div class="form-group">
                    <label for="biaya_pembayaran">Biaya Pembayaran</label>
                    <input type="number" class="form-control" id="biaya_pembayaran" placeholder="Biaya Pembayaran" name="biaya_pembayaran">
                </div>
                <div class="form-group">
                    <label for="nama_kasir">Nama Kasir</label>
                    <input class="form-control" id="nama_kasir" placeholder="Nama Kasir" name="nama_kasir">
                </div>
                <div class="form-group">
                    <label for="bukti_bayar">Bukti Pembayaran</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('bukti_bayar')) ? 'is-invalid' : ''; ?>" id="bukti_bayar" name="bukti_bayar">
                        <label class="custom-file-label" for="bukti_bayar">Pilih Gambar</label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('bukti_bayar'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <select class="form-control" id="ket" name="ket">
                        <option selected>Silakan Pilih</option>
                        <option>Lunas</option>
                        <option>Belum Lunas </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Pembayaran</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>