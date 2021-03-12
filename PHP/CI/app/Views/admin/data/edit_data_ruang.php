<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Edit Ruang</h1>
            <br><br>
            <form action="<?= base_url("admin/edit_ruangan"); ?>" method="post">
                <input type="hidden" class="form-control" value="<?= $ruang['id_ruang']; ?>" id="id_ruang" placeholder="Id" name="id_ruang">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama_ruang">Nama</label>
                        <input type="text" class="form-control" value="<?= $ruang['nama_ruang']; ?>" id="nama_ruang" placeholder="Nama Ruangan" name="nama_ruang">
                    </div>
                </div>
                <div class="form-group">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="number" class="form-control" value="<?= $ruang['kapasitas']; ?>" id="kapasitas" placeholder="Jumalh kapasitas yang di muat" name="kapasitas">
                </div>
                <button type="submit" class="btn btn-primary">Edit Ruang</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>