<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Tambah Obat</h1>
            <br><br>
            <form action="<?= base_url("admin/tambah_obat"); ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama_obat">Nama</label>
                        <input type="text" class="form-control" id="nama_obat" placeholder="Nama Obat" name="nama_obat">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" placeholder="Jumalh Stok yang Ada" name="stok">
                </div>
                <div class="form-group">
                    <label for="perusahaan">Tanggal Kadaluarsa</label>
                    <input type="date" class="form-control" id="tanggal_kadaluarsa" placeholder="Tanggal Kadaluarsa Obat" name="tanggal_kadaluarsa">
                </div>
                <div class="form-group">
                    <label for="perusahaan">Perusahaan Pembuat</label>
                    <input type="text" class="form-control" id="perusahaan" placeholder="Nama Perusahaan Pembuat" name="perusahaan">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Obat</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>