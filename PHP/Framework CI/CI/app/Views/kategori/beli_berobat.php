<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Tambah Pembelian Obat</h1>
            <br><br>
            <form action="<?= base_url("Users/tambah_membeli"); ?>" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_pasien">Nama Pembeli</label>
                        <select class="form-control" id="id_pasien" name="id_pasien">
                            <?php foreach ($pasien as $row3) : ?>
                                <option value="<?= $row3['id_pasien'] ?>"><?= $row3['nama_pasien']; ?></option>
                            <?php endforeach; ?>
                        </select><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_transaksi">Nama Kasir</label>
                    <select class="form-control" id="id_transaksi" name="id_transaksi">
                        <?php foreach ($bayar as $row4) : ?>
                            <option value="<?= $row4['id_transaksi'] ?>"><?= $row4['nama_kasir']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="id_obat">Nama Obat</label>
                    <select class="form-control" id="id_obat" name="id_obat">
                        <?php foreach ($user as $row2) : ?>
                            <option value="<?= $row2['id_obat'] ?>"><?= $row2['nama_obat']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="jumlah_beli">Jumlah Beli</label>
                    <input type="number" class="form-control" id="jumlah_beli" placeholder="Jumalh jumlah_beli yang Ada" name="jumlah_beli">
                </div><br>
                <div class="form-group">
                    <label for="bukti_bayaran">Bukti Bayar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('bukti_bayaran')) ? 'is-invalid' : ''; ?>" id="bukti_bayaran" name="bukti_bayaran">
                        <div class="invalid-feedback">
                            <?= $validation->getError('bukti_bayaran'); ?>
                        </div>
                        <label class="custom-file-label" for="bukti_bayaran">Pilih Gambar</label>
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary">Tambahkan Pembelian</button>
        </div>
        </form>
    </div>
</div>