<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Data Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Data Barang</h1>
    <div class="d-flex justify-content-between mb-3">
      <a href="index.php" class="btn btn-secondary">Kembali</a>
      <a href="form_tambah_barang.php" class="btn btn-primary">Tambah Barang</a>
    </div>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Harga Barang</th>
          <th>Stok Barang</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM barang";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
                    <tr>
                        <td>{$row['kode_barang']}</td>
                        <td>{$row['nama_barang']}</td>
                        <td>Rp " . number_format($row['harga_barang'], 0, ',', '.') . "</td>
                        <td>{$row['stok_barang']}</td>
                        <td>
                            <a href='form_edit_barang.php?kode={$row['kode_barang']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='proses_hapus_barang.php?kode={$row['kode_barang']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Delete</a>
                        </td>
                    </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>