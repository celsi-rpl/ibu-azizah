<?php

// Fungsi menampilkan data barang (READ)
function select($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


// Fungsi menambahkan data barang (CREATE)
function create_barang($post)
{
    global $db;

    $nama = mysqli_real_escape_string($db, $post['nama']);
    $jumlah = (int)$post['jumlah'];
    $harga = (int)$post['harga'];

    $query = "INSERT INTO `data barang`
              (nama, jumlah, harga, tanggal)
              VALUES ('$nama', $jumlah, $harga, CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// Fungsi mengubah data barang (UPDATE)
function update_barang($data)
{
    global $db;

    $id_barang = (int)$data['id_barang'];
    $nama = mysqli_real_escape_string($db, $data['nama']);
    $jumlah = (int)$data['jumlah'];
    $harga = (int)$data['harga'];

    $query = "UPDATE `data barang` SET
                nama = '$nama',
                jumlah = $jumlah,
                harga = $harga
              WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// Fungsi menghapus data barang (DELETE)
function delete_barang($id_barang)
{
    global $db;

    $id_barang = (int)$id_barang;

    $query = "DELETE FROM `data barang`
              WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
