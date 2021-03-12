<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Ubah Pembayaran</h1>
            <br><br>
            <form action="<?= base_url("Admin/edit_data_membayar"); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" value="<?= $pembayaran['id_transaksi']; ?>" id="id_transaksi" placeholder="Id" name="id_transaksi">
                <input type="hidden" value="<?= $pembayaran['bukti_bayar']; ?>" id="bukti_bayar" placeholder="Id" name="bukti_old">
                <div class="form-row">
                    <div class="form-group">
                        <label for="id">Nama Pasien</label>
                        <select class="form-control" id="id" name="id">
                            <?php foreach ($user as $row2) : ?>
                                <option value="<?= $row2['id'] ?>"><?= $row2['firstname']; ?></option>
                            <?php endforeach; ?>
                        </select><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="biaya_pembayaran">Biaya Pembayaran</label>
                    <input type="number" class="form-control" value="<?= $pembayaran['biaya_pembayaran']; ?>" id="biaya_pembayaran" placeholder="Biaya Pembayaran" name="biaya_pembayaran">
                </div>
                <div class="form-group">
                    <label for="nama_kasir">Nama Kasir</label>
                    <input class="form-control" id="nama_kasir" value="<?= $pembayaran['nama_kasir']; ?>" placeholder="Nama Kasir" name="nama_kasir">
                </div>
                <div class="form-group">
                    <label for="bukti_bayar">Bukti Pembayaran</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('bukti_bayar')) ? 'is-invalid' : ''; ?>" id="bukti_bayar" name="bukti_bayar">
                        <div class="invalid-feedback">
                            <?= $validation->getError('bukti_bayar'); ?>
                        </div>
                        <label class="custom-file-label" for="bukti_bayar"><?= $pembayaran['bukti_bayar']; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <select class="form-control" id="ket" name="ket">
                        <option selected>(Silakan Ubah Jika Ada Perubahan)</option>
                        <option>Lunas</option>
                        <option>Belum Lunas </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" value="<?= $pembayaran['tanggal']; ?>" id="tanggal" placeholder="Tanggal" name="tanggal">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>