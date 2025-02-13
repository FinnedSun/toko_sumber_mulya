<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah Transaksi</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Transaksi</h1>
    <div class="card shadow">
      <div class="card-body">
        <form action="proses_tambah_transaksi.php" method="POST">
          <!-- Input Tanggal Transaksi -->
          <div class="mb-3">
            <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
            <input type="datetime-local" class="form-control" id="tgl_transaksi" name="tgl_transaksi" required>
          </div>

          <!-- Pilih Barang -->
          <div class="mb-3">
            <label for="kode_barang" class="form-label">Pilih Barang</label>
            <select class="form-select" id="kode_barang" name="kode_barang" required onchange="updateBarangDetails()">
              <option value="">-- Pilih Barang --</option>
              <?php
              $sql = "SELECT * FROM barang";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['kode_barang']}' data-nama='{$row['nama_barang']}' data-harga='{$row['harga_barang']}' data-stok='{$row['stok_barang']}'>{$row['nama_barang']} (Stok: {$row['stok_barang']})</option>";
              }
              ?>
            </select>
          </div>

          <!-- Nama Barang (Otomatis Terisi) -->
          <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly>
          </div>

          <!-- Harga Barang (Otomatis Terisi) -->
          <div class="mb-3">
            <label for="harga_barang" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="harga_barang" name="harga_barang" readonly>
          </div>

          <!-- Stok Barang (Otomatis Terisi) -->
          <div class="mb-3">
            <label for="stok_barang" class="form-label">Stok Barang</label>
            <input type="number" class="form-control" id="stok_barang" name="stok_barang" readonly>
          </div>

          <!-- Input Jumlah Beli -->
          <div class="mb-3">
            <label for="jumlah_beli" class="form-label">Jumlah Beli</label>
            <input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" required
              oninput="hitungTotalBayar()">
          </div>

          <!-- Input Diskon -->
          <div class="mb-3">
            <label for="diskon" class="form-label">Diskon</label>
            <input type="number" class="form-control" id="diskon" name="diskon" value="0" oninput="hitungTotalBayar()">
          </div>

          <!-- Total Bayar (Otomatis Terisi) -->
          <div class="mb-3">
            <label for="total_bayar" class="form-label">Total Bayar</label>
            <input type="number" class="form-control" id="total_bayar" name="total_bayar" readonly>
          </div>

          <!-- Tombol Kembali dan Simpan -->
          <div class="d-flex justify-content-between">
            <a href="transaksi.php" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- JavaScript untuk Update Detail Barang dan Hitung Total Bayar -->
  <script>
    function updateBarangDetails() {
      const kodeBarang = document.getElementById('kode_barang');
      const selectedOption = kodeBarang.options[kodeBarang.selectedIndex];

      document.getElementById('nama_barang').value = selectedOption.getAttribute('data-nama');
      document.getElementById('harga_barang').value = selectedOption.getAttribute('data-harga');
      document.getElementById('stok_barang').value = selectedOption.getAttribute('data-stok');
      hitungTotalBayar(); // Hitung ulang total bayar saat barang berubah
    }

    function hitungTotalBayar() {
      const harga = parseFloat(document.getElementById('harga_barang').value) || 0;
      const jumlahBeli = parseFloat(document.getElementById('jumlah_beli').value) || 0;
      const diskon = parseFloat(document.getElementById('diskon').value) || 0;

      const totalBayar = (harga * jumlahBeli) - diskon;
      document.getElementById('total_bayar').value = totalBayar;
    }
  </script>
</body>

</html>