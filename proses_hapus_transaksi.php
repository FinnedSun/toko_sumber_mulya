<?php
include 'config.php';

// Ambil ID transaksi dari URL
$id_transaksi = $_GET['id'];

// Query untuk menghapus transaksi
$sql = "DELETE FROM transaksi WHERE id_transaksi = $id_transaksi";
if (mysqli_query($conn, $sql)) {
  // Jika berhasil dihapus, redirect ke halaman transaksi
  header("Location: transaksi.php");
} else {
  // Jika gagal, tampilkan pesan error
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>