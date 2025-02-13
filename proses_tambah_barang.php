<?php
include 'config.php';
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$sql = "INSERT INTO barang VALUES ('$kode', '$nama', $harga, $stok)";
mysqli_query($conn, $sql);
header("Location: barang.php");
?>