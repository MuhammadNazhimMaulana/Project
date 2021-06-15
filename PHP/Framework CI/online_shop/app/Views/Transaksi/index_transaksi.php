<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>

<h1 class="mt-4">Daftar Transaksi</h1>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Pembeli</th>
            <th>Alamat</th>
            <th>Jumlah Pembelian</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($model as $index => $transaksi) : ?>
            <tr>
                <td><?= $transaksi->id_transaksi ?></td>
                <td><?= $transaksi->id_barang ?></td>
                <td><?= $transaksi->id_user ?></td>
                <td><?= $transaksi->alamat ?></td>
                <td><?= $transaksi->jumlsh ?></td>
                <td><?= $transaksi->total_harga ?></td>
                <td>
                    <a href="<?= site_url('Transaksi_C/view/' . $transaksi->id_transaksi) ?>" class="btn btn-primary">View</a>
                    <a href="<?= site_url('Transaksi_C/invoice/' . $transaksi->id_transaksi) ?>" class="btn btn-info">Invoice</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>