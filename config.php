<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "toko_sumber_mulya";

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>