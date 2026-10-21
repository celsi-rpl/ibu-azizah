<?php include 'layout2/header.php'; ?>


    <div class="container mt-5">
        <h1 class="text-center"><Data>DATA BARANG</Data></h1>
        <a href="tambah-barang.php" class="btn btn-primary mb-1">Tambah</a>
        <table class="table table-bordered table-striped align-middle text-center">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>MENU</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>TANGGAL</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_barang as$barang) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $barang['nama']; ?></td>
                    <td>Rp. <?=number_format($barang['harga'], 0, ',', ','); ?></td>
                    <td><?= $barang['jumlah']; ?></td>
                    <td><?= $barang['tanggal']; ?></td>
                    <td width="15%" class="text-center">
                        <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>"
                        class="btn btn-primary">Ubah</a>
                        <a href="hapus-barang.php?id_barang=<?=$barang['id_barang']; ?>" class="btn
                        btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus.');">Hapus</a>
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include 'layout2/footer.php'; ?>