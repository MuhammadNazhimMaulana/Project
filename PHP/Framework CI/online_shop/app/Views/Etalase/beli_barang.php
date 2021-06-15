<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>
<?php
$id_user = [
    'name' => 'id_user',
    'id' => 'id_user',
    'value' => session()->get('id_user'),
    'type' => 'hidden'

];

$id_barang = [
    'name' => 'id_barang',
    'id' => 'id_barang',
    'value' => $belanjaan->id_barang,
    'type' => 'hidden'
];

$jumlah = [
    'name' => 'jumlah',
    'id' => 'jumlah',
    'value' => 1,
    'min' => 1,
    'class' => 'form-control',
    'type' => 'number',
    'max' => $belanjaan->stok

];

$total_harga = [
    'name' => 'total_harga',
    'id' => 'total_harga',
    'value' => null,
    'class' => 'form-control',
    'readonly' => true,

];

$alamat = [
    'name' => 'alamat',
    'id' => 'alamat',
    'value' => null,
    'class' => 'form-control',

];

$ongkir = [
    'name' => 'ongkir',
    'id' => 'ongkir',
    'value' => null,
    'class' => 'form-control',
    'readonly' => true,

];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Beli',
    'class' => 'btn btn-success',
    'type' => 'submit',

];

?>

<h1 class="mt-4">Beli Barang</h1>

<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <img src="<?= base_url('uploads/' . $belanjaan->gambar) ?>" class="img-fluid" style="max-height: 300px">
                    <h1 class="text-success"><?= $belanjaan->nama_barang ?></h1>
                    <h4>Harga : <?= $belanjaan->harga ?></h4>
                    <h4>Stok : <?= $belanjaan->stok ?></h4>
                </div>
            </div>
        </div>
        <div class="col-6">

            <!-- Bagian Awal API -->
            <h4>Pengiriman</h4>
            <div class="form-group mt-3">
                <label for="provinsi">Pilih Provinsi</label>
                <select id="provinsi" class="form-control">
                    <option>Pilih Provinsi</option>
                    <?php foreach ($provinsi as $p) : ?>
                        <option value="<?= $p->province_id ?>"><?= $p->province ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="kabupaten">Pilih Kabupaten/Kota</label>
                <select id="kabupaten" class="form-control">
                    <option>Pilih Kabupaten/Kota</option>
                </select>
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="service">Pilih Layanan</label>
                <select id="service" class="form-control">
                    <option>Pilih Layanan</option>
                </select>
            </div>
            <strong>Estimasi : <span id="estimasi"></span></strong>
            <hr>
            <!-- Bagian Akhir API -->

            <?= form_open('User/Etalase_C/beli/' . $belanjaan->id_barang) ?>
            <?= form_input($id_user) ?>
            <?= form_input($id_barang) ?>

            <div class="form-group mt-3">
                <?= form_label('Jumlah Pembelian', 'jumlah') ?>
                <?= form_input($jumlah) ?>
            </div>
            <div class="form-group mt-3">
                <?= form_label('Ongkos Kirim', 'ongkir') ?>
                <?= form_input($ongkir) ?>
            </div>

            <div class="form-group mt-3">
                <?= form_label('Total Harga', 'total_harga') ?>
                <?= form_input($total_harga) ?>
            </div>

            <div class="form-group mt-3">
                <?= form_label('Alamat', 'alamat') ?>
                <?= form_input($alamat) ?>
            </div>

            <div class="d-flex justify-content-end mt-3">

                <!-- Form submit terkait submit-->
                <?= form_submit($submit) ?>
            </div>

            <?= form_close() ?>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Komentar</h4>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            <a class="btn btn-link" href="<?= site_url('User/Komentar_C/create/' . $belanjaan->id_barang) ?>">Tinggalkan Komentar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($komentar as $k) : ?>
                                <?php
                                $model_u = new \App\Models\User_Model();
                                $nama_user = $model_u->find($k->id_user)->username;
                                ?>
                                <strong><?= $nama_user ?></strong>
                                <br>
                                <?= $k->komentar ?>
                                <hr>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Untuk Jquery custom -->
<?= $this->section('script') ?>

<script>
    $('document').ready(function() {
        // Variable Global

        var jumlah = 1;
        var harga = <?= $belanjaan->harga ?>;
        var ongkir = 0;

        // Membuat kabupaten data setelah isi provinsi
        // # untuk memanggil id lalu . untuk class

        $("#provinsi").on('change', function() {
            // Mengosongkan dropdown
            $("#kabupaten").empty();
            var id_province = $(this).val();
            $.ajax({
                url: "<?= site_url('User/Etalase_C/getCity') ?>",
                type: 'GET',
                data: {
                    'id_province': id_province,
                },
                dataType: 'json',
                // Jikalau sukses
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"];
                    for (var i = 0; i < results.length; i++) {
                        // append berarti menambahkan
                        $("#kabupaten").append($('<option>', {
                            value: results[i]["city_id"],
                            text: results[i]["city_name"]
                        }));
                    }
                },
            });
        });

        $("#kabupaten").on('change', function() {
            var id_city = $(this).val();
            $.ajax({
                url: "<?= site_url('User/Etalase_C/getCost') ?>",
                type: 'GET',
                data: {
                    'origin': 99,
                    'destination': id_city,
                    'weight': 1000,
                    'courier': 'jne'
                },
                dataType: 'json',
                // Jikalau sukses
                success: function(data) {
                    console.log(data);
                    var results = data["rajaongkir"]["results"][0]["costs"];
                    for (var i = 0; i < results.length; i++) {
                        var text = results[i]["description"] + "(" + results[i]["service"] + ")";
                        $("#service").append($('<option>', {
                            value: results[i]["cost"][0]["value"],
                            text: text,
                            etd: results[i]["cost"][0]["etd"]
                        }));
                    }
                },
            });
        });

        $("#service").on('change', function() {
            var estimasi = $('option:selected', this).attr('etd');
            ongkir = parseInt($(this).val());
            $("#ongkir").val(ongkir);
            $("#estimasi").html(estimasi + " Hari");
            var total_harga = (jumlah * harga) + ongkir;
            $("#total_harga").val(total_harga);
        });

        $("#jumlah").on('change', function() {
            jumlah = $("#jumlah").val();
            var total_harga = (jumlah * harga) + ongkir;
            $("#total_harga").val(total_harga);
        });

    });
</script>

<?= $this->endSection() ?>