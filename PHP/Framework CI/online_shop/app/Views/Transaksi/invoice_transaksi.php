<html>

<head>
    <!-- Styling tabelnya (awal) -->
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>
    <!-- Styling table (akhir) -->
</head>

<body>
    <div style="font-size: 64px; color: '#dddddd' "><i>Invoice</i></div>
    <p>
        <i>Toko Online Bonevian</i><br>
        Bone, Indoneasi <br>
        048124848
    </p>
    <p>
        Pembeli : <?= $user->username ?><br>
        Alamat : <?= $transaksi->alamat ?><br>
        Transaksi No : <?= $transaksi->id_transaksi ?><br>
        Tanggal : <?= date('Y-m-d', strtotime($transaksi->created_date)) ?><br>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Barang</strong></th>
            <th><strong>Harga Satuan</strong></th>
            <th><strong>Jumlah</strong></th>
            <th><strong>Ongkir</strong></th>
            <th><strong>Total Harga</strong></th>
        </tr>
        <tr>
            <td><?= $barang->nama_barang ?></td>
            <td><?= "Rp " . number_format($barang->harga, 2, ',', '.') ?></td>
            <td><?= $transaksi->jumlah ?></td>
            <td><?= "Rp " . number_format($transaksi->ongkir, 2, ',', '.') ?></td>
            <td><?= "Rp " . number_format($transaksi->total_harga, 2, ',', '.') ?></td>
        </tr>
    </table>
</body>

</html>