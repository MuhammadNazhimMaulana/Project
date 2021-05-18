<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Edit Laporan</h1>
            <br><br>
            <form action="<?= base_url("admin/edit_lapor"); ?>" method="post">
                <input type="hidden" class="form-control" value="<?= $laporan['id_laporan']; ?>" id="id_laporan" placeholder="Id" name="id_laporan">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="tanggal_bergabung">Periode Mulai</label>
                        <input type="date" class="form-control" value="<?= $laporan['tanggal_bergabung']; ?>" id="tanggal_bergabung" placeholder="Tanggal Awal Bulan" name="tanggal_bergabung">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar">Periode Selesai</label>
                    <input type="date" class="form-control" value="<?= $laporan['tanggal_keluar']; ?>" id="tanggal_keluar" placeholder="Tanggal Akhir Bulan" name="tanggal_keluar">
                </div>
                <div class="form-group">
                    <label for="total_transaksi">Total Transaksi</label>
                    <input type="number" class="form-control" value="<?= $laporan['total_transaksi']; ?>" id="total_transaksi" placeholder="Perubahan Total" name="total_transaksi">
                </div>
                <button type="submit" class="btn btn-primary">Edit Laporan</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>