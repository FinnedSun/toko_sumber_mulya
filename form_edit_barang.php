<?php
include 'config.php';
$kode = $_GET['kode'];
$sql = "SELECT * FROM barang WHERE kode_barang = '$kode'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Edit Barang</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Edit Barang</h1>
    <div class="card shadow">
      <div class="card-body">
        <form action="proses_edit_barang.php" method="POST">
          <div class="mb-3">
            <label for="kode" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $row['kode_barang'] ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama_barang'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $row['harga_barang'] ?>"
              required>
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?= $row['stok_barang'] ?>" required>
          </div>
          <div class="d-flex justify-content-between">
            <a href="barang.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>