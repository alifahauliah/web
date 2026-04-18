<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pesanan - Hilman Sport</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="page-hero">
  <div class="container">
    <span class="section-tag">ADMIN</span>
    <h1>DATA PESANAN</h1>
    <p>Semua pesanan yang masuk tercatat di sini</p>
  </div>
</section>

<section class="table-section">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <span class="section-tag">REKAP</span>
        <h2 class="section-title">Tabel Pesanan Masuk</h2>
      </div>
      <a href="pemesanan.php" class="btn btn-primary-custom">+ Tambah Pesanan</a>
    </div>

    <?php
    $file = 'data_pesanan.csv';
    $pesanan = [];
    if(file_exists($file)) {
      $fp = fopen($file, 'r');
      $header = fgetcsv($fp); // skip header
      while(($row = fgetcsv($fp)) !== false) {
        $pesanan[] = $row;
      }
      fclose($fp);
    }
    ?>

    <?php if(empty($pesanan)): ?>
    <div style="text-align:center;padding:80px;background:white;border-radius:12px;">
      <div style="font-size:4rem;margin-bottom:16px;">📋</div>
      <h4 style="color:var(--primary);font-family:'Bebas Neue',cursive;letter-spacing:2px;">BELUM ADA PESANAN</h4>
      <p style="color:var(--gray);">Belum ada pesanan yang masuk.</p>
      <a href="pemesanan.php" class="btn btn-primary-custom mt-3">Buat Pesanan Pertama</a>
    </div>
    <?php else: ?>

    <!-- SUMMARY CARDS -->
    <div class="row g-3 mb-4">
      <div class="col-md-3 col-6">
        <div style="background:var(--primary);color:white;border-radius:8px;padding:20px;text-align:center;">
          <div style="font-family:'Bebas Neue',cursive;font-size:2.5rem;color:var(--accent);"><?= count($pesanan) ?></div>
          <div style="font-size:0.8rem;letter-spacing:1px;text-transform:uppercase;">Total Pesanan</div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div style="background:var(--secondary);color:white;border-radius:8px;padding:20px;text-align:center;">
          <div style="font-family:'Bebas Neue',cursive;font-size:2.5rem;"><?= array_sum(array_column($pesanan, 6)) ?></div>
          <div style="font-size:0.8rem;letter-spacing:1px;text-transform:uppercase;">Total Item</div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div style="background:#1a5c2a;color:white;border-radius:8px;padding:20px;text-align:center;">
          <div style="font-family:'Bebas Neue',cursive;font-size:2.5rem;"><?= count(array_unique(array_column($pesanan, 1))) ?></div>
          <div style="font-size:0.8rem;letter-spacing:1px;text-transform:uppercase;">Pelanggan</div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div style="background:#7b1c1c;color:white;border-radius:8px;padding:20px;text-align:center;">
          <div style="font-family:'Bebas Neue',cursive;font-size:2.5rem;"><?= count(array_unique(array_column($pesanan, 4))) ?></div>
          <div style="font-size:0.8rem;letter-spacing:1px;text-transform:uppercase;">Jenis Produk</div>
        </div>
      </div>
    </div>

    <div class="custom-table" style="overflow-x:auto;">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pemesan</th>
            <th>Telepon</th>
            <th>Produk</th>
            <th>Ukuran</th>
            <th>Jumlah</th>
            <th>Alamat</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($pesanan as $i => $p): ?>
          <tr>
            <td><?= $i+1 ?></td>
            <td style="font-size:0.8rem;color:var(--gray);"><?= $p[0] ?></td>
            <td><strong><?= $p[1] ?></strong></td>
            <td><?= $p[2] ?></td>
            <td><span style="color:var(--secondary);font-weight:600;"><?= $p[4] ?></span></td>
            <td><?= $p[5] ?></td>
            <td><strong><?= $p[6] ?></strong></td>
            <td style="font-size:0.85rem;max-width:200px;"><?= $p[7] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <p class="mt-3" style="color:var(--gray);font-size:0.85rem;">Total: <?= count($pesanan) ?> pesanan tercatat</p>
    <?php endif; ?>

  </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
