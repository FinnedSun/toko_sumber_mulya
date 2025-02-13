<?php
include 'config.php';
$kode_barang = $_POST['kode_barang'];
$jumlah_beli = $_POST['jumlah_beli'];
$diskon = $_POST['diskon'];

// Ambil data barang
$sql = "SELECT * FROM barang WHERE kode_barang = '$kode_barang'";
$result = mysqli_query($conn, $sql);
$barang = mysqli_fetch_assoc($result);

// Validasi stok
if ($jumlah_beli > $barang['stok_barang']) {
  die("Stok tidak cukup!");
}

// Hitung total bayar
$total_bayar = ($barang['harga_barang'] * $jumlah_beli) - $diskon;
$stok_akhir = $barang['stok_barang'] - $jumlah_beli;

// Update stok barang
$sql = "UPDATE barang SET stok_barang = $stok_akhir WHERE kode_barang = '$kode_barang'";
mysqli_query($conn, $sql);

// Simpan transaksi
$sql = "INSERT INTO transaksi (kode_barang, harga_barang, jumlah_beli, diskon, total_bayar, stok_akhir) 
        VALUES ('$kode_barang', {$barang['harga_barang']}, $jumlah_beli, $diskon, $total_bayar, $stok_akhir)";
mysqli_query($conn, $sql);

header("Location: transaksi.php");
?>