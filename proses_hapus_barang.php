<?php
include 'config.php';

// Ambil kode barang dari URL
$kode_barang = $_GET['kode'];

// Query untuk menghapus barang
$sql = "DELETE FROM barang WHERE kode_barang = '$kode_barang'";
if (mysqli_query($conn, $sql)) {
  // Jika berhasil dihapus, redirect ke halaman barang
  header("Location: barang.php");
} else {
  // Jika gagal, tampilkan pesan error
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>