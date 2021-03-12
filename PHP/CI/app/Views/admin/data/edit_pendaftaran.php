<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-2 bg-white from-wrapper"> <br>
            <h1>Pendaftaran</h1>
            <br><br>
            <form action="<?= base_url("admin/edit_daftar"); ?>" method="post">
                <input type="hidden" class="form-control" value="<?= $Data['id_daftar']; ?>" id="id_daftar" placeholder="Id" name="id_daftar">
                <div class="form-row">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" value="<?= $Data['nama']; ?>" id="nama" placeholder="Nama Lengkap" name="nama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sakit">Keluhan Sakit</label>
                    <input type="text" class="form-control" value="<?= $Data['sakit']; ?>" id="sakit" rows="5" name="sakit"></input>
                </div>
                <label for="id_dokter">Spesialis</label>
                <select class="form-control" value="<?= $Data['id_dokter']; ?>" id="id_dokter" name="id_dokter">
                    <?php foreach ($spesialis as $row) : ?>
                        <option value="<?= $row['id_dokter'] ?>"><?= $row['spesialis']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <div class="form-group">
                    <label for="kebutuhan">Kebutuhan</label>
                    <select class="form-control" id="kebutuhan" name="kebutuhan">
                        <option selected>Silakan Pilih</option>
                        <option>Urgent</option>
                        <option>Tidak Urgent</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
        </div>
    </div>
    </form>
</div>
</div>
</div>