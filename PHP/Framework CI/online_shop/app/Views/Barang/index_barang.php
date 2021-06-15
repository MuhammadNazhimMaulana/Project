<?= $this->extend('template/layout_user') ?>
<?= $this->section('content') ?>

<h1 class="mt-4">Barang</h1>

<table class="table">
    <thead>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Gambar</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php foreach ($barang_barang as $index => $barang) : ?>
            <tr>
                <td><?= ($index + 1) ?></td>
                <td><?= $barang->nama_barang ?></td>
                <td><img src="<?= base_url('uploads/' . $barang->gambar) ?>" alt="gambar" width="200px" class="image-fluid"></td>
                <td><?= $barang->harga ?></td>
                <td><?= $barang->stok ?></td>
                <td>
                    <a href="<?= site_url('Barang_C/view/' . $barang->id_barang) ?>" class="btn btn-primary">View</a>
                    <a href="<?= site_url('Barang_C/update/' . $barang->id_barang) ?>" class="btn btn-success">Update</a>
                    <a href="<?= site_url('Barang_C/delete/' . $barang->id_barang) ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>