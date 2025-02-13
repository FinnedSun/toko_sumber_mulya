<?php
include 'config.php';
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$sql = "UPDATE barang SET 
        nama_barang = '$nama', 
        harga_barang = $harga, 
        stok_barang = $stok 
        WHERE kode_barang = '$kode'";
mysqli_query($conn, $sql);
header("Location: barang.php");
?>