<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Pembayaran</h1>
            <br><br>
            <form action="<?= base_url("Users/edit_data_pembayaran"); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" value="<?= $pembayaran['id_transaksi']; ?>" id="id_transaksi" placeholder="Id" name="id_transaksi">
                <input type="hidden" value="<?= $pembayaran['bukti_bayar']; ?>" id="bukti_bayar" placeholder="Id" name="bukti_old">
                <div class="form-row">
                    <div class="form-group">
                        <label for="id_pasien">Nomor Nama</label>
                        <input type="number" class="form-control" readonly value="<?= $pembayaran['id_pasien']; ?>" id="id_pasien" placeholder="Biaya Pembayaran" name="id_pasien">
                    </div>
                </div>
                <div class="form-group">
                    <label for="biaya_pembayaran">Biaya Pembayaran</label>
                    <input type="number" class="form-control" readonly value="<?= $pembayaran['biaya_pembayaran']; ?>" id="biaya_pembayaran" placeholder="Biaya Pembayaran" name="biaya_pembayaran">
                </div>
                <div class="form-group">
                    <label for="nama_kasir">Nama Kasir</label>
                    <input class="form-control" id="nama_kasir" readonly value="<?= $pembayaran['nama_kasir']; ?>" placeholder="Nama Kasir" name="nama_kasir">
                </div>
                <div class="form-group">
                    <label for="bukti_bayar">Bukti Pembayaran</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="bukti_bayar" name="bukti_bayar">
                        <label class="custom-file-label" for="bukti_bayar"><?= $pembayaran['bukti_bayar']; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input class="form-control" id="ket" readonly value="<?= $pembayaran['ket']; ?>" placeholder="Keterangannya" name="ket">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" readonly value="<?= $pembayaran['tanggal']; ?>" id="tanggal" placeholder="Tanggal" name="tanggal">
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