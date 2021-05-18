<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-10 offset-md-1 mt-5 pt-5 pb-5 bg-white from-wrapper"> <br>
            <h1>Edit Data</h1>
            <br><br>
            <form action="<?= base_url('admin/edit_dokter'); ?>" method="post">
                <input type="hidden" class="form-control" value="<?= $dokter['id_dokter']; ?>" id="id_dokter" placeholder="Id" name="id_dokter">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nama_dokter">Nama</label>
                        <input type="text" class="form-control" value="<?= $dokter['nama_dokter']; ?>" id="nama_dokter" placeholder="Nama Dokter" name="nama_dokter">
                    </div>
                </div>
                <div class="form-group">
                    <label for="rumah_sakit">Rumah Sakit</label>
                    <input type="text" class="form-control" value="<?= $dokter['rumah_sakit']; ?>" id="rumah_sakit" placeholder="Nama Rumah Sakit Lengkap" name="rumah_sakit">
                </div>
                <div class="form-group">
                    <label for="spesialis">Spesialis</label>
                    <input type="text" class="form-control" value="<?= $dokter['spesialis']; ?>" id="spesialis" placeholder="Spesialis Lengkap" name="spesialis">
                </div>
                <div class="form-group">
                    <label for="jadwal_hari">Jadwal Hari</label>
                    <input type="text" class="form-control" value="<?= $dokter['jadwal_hari']; ?>" id="jadwal_hari" placeholder="Hari Kerja Lengkap" name="jadwal_hari">
                </div>
                <div class="form-group">
                    <label for="jadwal_waktu">Jadwal Jam</label>
                    <input type="text" class="form-control" value="<?= $dokter['jadwal_waktu']; ?>" id="jadwal_waktu" placeholder="Jam Kerja Lengkap" name="jadwal_waktu">
                </div>
                <div class="form-group">
                    <label for="jenis_klinik">Klinik</label>
                    <input type="text" class="form-control" value="<?= $dokter['jenis_klinik']; ?>" id="jenis_klinik" placeholder="Nama Klinik" name="jenis_klinik">
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