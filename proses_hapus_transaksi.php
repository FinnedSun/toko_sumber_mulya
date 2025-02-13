<?php
include 'config.php';

$id_transaksi = $_GET['id'];

$sql = "DELETE FROM transaksi WHERE id_transaksi = $id_transaksi";
if (mysqli_query($conn, $sql)) {
  header("Location: transaksi.php");
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>