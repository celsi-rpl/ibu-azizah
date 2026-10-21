<?php

include_once 'layout2/header.php';

// Mengambil ID barang dari URL
$id_barang = isset($_GET['id_barang'])
    ? (int)$_GET['id_barang']: 0;

// Mengambil data barang
$hasil = select(
    "SELECT * FROM `data barang` WHERE id_barang = $id_barang");

if (empty($hasil)) {
    echo "<script>
        alert('Data barang tidak ditemukan!');
        document.location.href = 'index2.php';
    </script>";
    exit;
}

$barang = $hasil[0];

// Proses mengubah data barang
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) >= 0) {
        echo "<script>
            alert('Data Barang Berhasil Diubah');
            document.location.href = 'index2.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Data Barang Gagal Diubah');
            document.location.href = 'index2.php';
        </script>";
    }
}

?>

<div class="container mt-5">
    <h2 class="text-center">Ubah Barang</h2>

    <form action="" method="post">

        <input type="hidden" name="id_barang"
            value="<?= $barang['id_barang']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">
                Nama Barang
            </label>
            <input type="text"
                class="form-control"
                id="nama"
                name="nama"
                value="<?= htmlspecialchars($barang['nama']); ?>"
                placeholder="Nama Barang..."
                required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">
                Jumlah
            </label>
            <input type="number"
                class="form-control"
                id="jumlah"
                name="jumlah"
                value="<?= $barang['jumlah']; ?>"
                placeholder="Jumlah Barang..."
                required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">
                Harga Barang
            </label>
            <input type="number"
                class="form-control"
                id="harga"
                name="harga"
                value="<?= $barang['harga']; ?>"
                placeholder="Harga Barang..."
                required>
        </div>

        <button type="submit"
            name="ubah"
            class="btn btn-primary float-end">
            Ubah
        </button>

    </form>
</div>

<?php include 'layout2/footer.php'; ?>