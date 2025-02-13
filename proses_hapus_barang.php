<?php
include 'config.php';

$kode_barang = $_GET['kode'];

$sql = "DELETE FROM barang WHERE kode_barang = '$kode_barang'";
if (mysqli_query($conn, $sql)) {
  header("Location: barang.php");
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>