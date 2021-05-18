<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Edit Pembelian Obat</h1>
            <br><br>
            <form action="<?= base_url("admin/edit_beli"); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" value="<?= $membeli['id_pembelian']; ?>" id="id_pembelian" placeholder="Id_pembelian" name="id_pembelian">
                <input type="hidden" value="<?= $membeli['bukti_bayaran']; ?>" id="bukti_bayaran" placeholder="id_pembelian" name="bukti_old">
                <div class="form-row">
                    <div class="form-group">
                        <label for="id">Nama Pembeli</label>
                        <select class="form-control" id="id" name="id">
                            <?php foreach ($pengguna as $roww) : ?>
                                <option value="<?= $roww['id'] ?>"><?= $roww['firstname']; ?></option>
                            <?php endforeach; ?>
                        </select><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_pasien">Jadwal</label>
                    <select class="form-control" id="id_pasien" name="id_pasien">
                        <?php foreach ($pasien as $row3) : ?>
                            <option value="<?= $row3['id_pasien'] ?>"><?= $row3['jadwal_periksa']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
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
                    <input type="number" value="<?= $membeli['jumlah_beli'] ?>" class="form-control  <?= ($validation->hasError('jumlah_beli')) ? 'is-invalid' : ''; ?>" id="jumlah_beli" placeholder="Jumlah yang mau di beli" name="jumlah_beli">
                    <div class="invalid-feedback">
                        <?= $validation->getError('jumlah_beli'); ?>
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="bukti_bayaran">Bukti Pembayaran</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="bukti_bayaran" name="bukti_bayaran">
                        <label class="custom-file-label" for="bukti_bayaran">Pilih Gambar</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Pembelian</button>
        </div>
        </form>
    </div>
</div>