<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Data Transaksi</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Data Transaksi</h1>
    <div class="d-flex justify-content-between mb-3">
      <a href="index.php" class="btn btn-secondary">Kembali</a>
      <a href="form_tambah_transaksi.php" class="btn btn-primary">Tambah Transaksi</a>
    </div>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID Transaksi</th>
          <th>Tanggal</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Jumlah Beli</th>
          <th>Stok Akhir</th>
          <th>Diskon</th>
          <th>Total Bayar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT t.*, b.nama_barang 
                        FROM transaksi t 
                        JOIN barang b ON t.kode_barang = b.kode_barang";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
                    <tr>
                        <td>{$row['id_transaksi']}</td>
                        <td>{$row['tgl_transaksi']}</td>
                        <td>{$row['kode_barang']}</td>
                        <td>{$row['nama_barang']}</td>
                        <td>Rp " . number_format($row['harga_barang'], 0, ',', '.') . "</td>
                        <td>{$row['jumlah_beli']}</td>
                        <td>{$row['stok_akhir']}</td>
                        <td>Rp " . number_format($row['diskon'], 0, ',', '.') . "</td>
                        <td>Rp " . number_format($row['total_bayar'], 0, ',', '.') . "</td>
                        <td>
                            <a href='proses_hapus_transaksi.php?id={$row['id_transaksi']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Delete</a>
                        </td>
                    </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>