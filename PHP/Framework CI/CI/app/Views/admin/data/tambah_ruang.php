<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Tambah Ruang</h1>
            <br><br>
            <form action="<?= base_url("admin/tambah_ruang"); ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama_ruang">Nama Ruangan</label>
                        <input type="text" class="form-control" id="nama_ruang" placeholder="Nama Ruang" name="nama_ruang">
                    </div>
                </div>
                <div class="form-group">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="number" class="form-control" id="kapasitas" placeholder="Jumalh Kapasitas yang Bisa di Muat" name="kapasitas">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Ruang</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>