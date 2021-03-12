<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Edit Obat</h1>
            <br><br>
            <form action="<?= base_url("admin/edit_obat"); ?>" method="post">
                <input type="hidden" class="form-control" value="<?= $obat['id_obat']; ?>" id="id_obat" placeholder="Id" name="id_obat">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama_obat">Nama</label>
                        <input type="text" class="form-control" value="<?= $obat['nama_obat']; ?>" id="nama_obat" placeholder="Nama Obat" name="nama_obat">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" value="<?= $obat['stok']; ?>" id="stok" placeholder="Jumalh Stok yang Ada" name="stok">
                </div>
                <div class="form-group">
                    <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                    <input type="date" class="form-control" value="<?= $obat['tanggal_kadaluarsa']; ?>" id="tanggal_kadaluarsa" placeholder="Tanggal Kadaluarsa Obat" name="tanggal_kadaluarsa">
                </div>
                <div class="form-group">
                    <label for="perusahaan">Perusahaan Pembuat</label>
                    <input type="text" class="form-control" value="<?= $obat['perusahaan']; ?>" id="perusahaan" placeholder="Nama Perusahaan Pembuat" name="perusahaan">
                </div>
                <button type="submit" class="btn btn-primary">Edit Obat</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>