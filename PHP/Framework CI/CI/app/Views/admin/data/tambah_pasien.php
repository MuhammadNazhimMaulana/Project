<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Tambah Pasien</h1>
            <br><br>
            <form action="<?= base_url("admin/tambah_pasien"); ?>" method="post">
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
                    <label for="jadwal_periksa">Jadwal Periksa</label>
                    <input type="date" class="form-control" id="jadwal_periksa" placeholder="Jadwal periksa" name="jadwal_periksa">
                </div>
                <div class="form-group">
                    <label for="id_dokter">Nama Pemeriksa</label>
                    <select class="form-control" id="id_dokter" name="id_dokter">
                        <?php foreach ($dokter as $row3) : ?>
                            <option value="<?= $row3['id_dokter'] ?>"><?= $row3['nama_dokter']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_ruang">Nama Ruang</label>
                    <select class="form-control" id="id_ruang" name="id_ruang">
                        <?php foreach ($ruang as $row1) : ?>
                            <option value="<?= $row1['id_ruang'] ?>"><?= $row1['nama_ruang']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="id_daftar">Keluhan</label>
                    <select class="form-control" id="id_daftar" name="id_daftar">
                        <?php foreach ($spesialis as $row) : ?>
                            <option value="<?= $row['id_daftar'] ?>"><?= $row['sakit']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="id_obat">Nama Obat</label>
                    <select class="form-control" id="id_obat" name="id_obat">
                        <?php foreach ($obat as $roow) : ?>
                            <option value="<?= $roow['id_obat'] ?>"><?= $roow['nama_obat']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Jadwal</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>