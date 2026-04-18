<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hilman Sport - Peralatan Taekwondo Terbaik</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="container h-100 d-flex align-items-center">
    <div class="hero-content">
      <span class="badge-tag">⚡ No.1 Taekwondo Store</span>
      <h1>HILMAN<br><span>SPORT</span></h1>
      <p>Perlengkapan Taekwondo Profesional<br>untuk Semua Level — Pemula hingga Juara</p>
      <div class="hero-btns">
        <a href="produk.php" class="btn btn-primary-custom">Lihat Produk</a>
        <a href="tentang.php" class="btn btn-outline-custom">Tentang Kami</a>
      </div>
    </div>
  </div>
  <div class="hero-number">跆拳道</div>
</section>

<!-- STATS -->
<section class="stats-bar">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-3 col-6 stat-item">
        <h2>50+</h2><p>Produk Tersedia</p>
      </div>
      <div class="col-md-3 col-6 stat-item">
        <h2>1K+</h2><p>Pelanggan Puas</p>
      </div>
      <div class="col-md-3 col-6 stat-item">
        <h2>30+</h2><p>Tahun Pengalaman</p>
      </div>
      <div class="col-md-3 col-6 stat-item">
        <h2>50+</h2><p>Kota Pengiriman</p>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="section-products py-5">
  <div class="container">
    <div class="section-header text-center mb-5">
      <span class="section-tag">UNGGULAN</span>
      <h2 class="section-title">Produk Pilihan</h2>
    </div>
    <div class="row g-4">
      <?php
      $products = [
        ["Dobok Premium", "Seragam Taekwondo WTF resmi...", "Rp 400.000", "", "dobok.jpeg"],
        ["Pelindung Dada", "Body protector standar...", "Rp 350.000", "", "body.jpeg"],
        ["Helm Taekwondo", "Head guard CE certified...", "Rp 500.000", "", "helm.jpeg"],
        ["Target Tendang", "Mitts & target pad...", "Rp 150.000", "", "target.jpeg"],
        ];

      foreach($products as $p): ?>
      <div class="product-card" style="
      background-image: url('<?= $p[4] ?>');
      background-size: cover;
      background-position: center;
      position: relative;
      overflow: hidden;
      padding: 0;
      height: 280px;
    ">
      <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(6,21,48,0.95) 45%,rgba(6,21,48,0.15) 100%);"></div>
      <div style="position:absolute;bottom:0;padding:20px;z-index:2;">
        <p style="color:rgba(255,255,255,0.6);font-size:11px;letter-spacing:2px;margin:0 0 4px;text-transform:uppercase;">Alat Latihan</p>
        <h5 style="color:white;margin:0 0 6px;"><?= $p[0] ?></h5>
        <div class="product-price"><?= $p[2] ?></div>
        <a href="produk.php" class="btn-buy" style="color:rgba(255,255,255,0.7);">Lihat Detail →</a>
      </div>
    </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-5">
      <a href="produk.php" class="btn btn-primary-custom">Lihat Semua Produk</a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container text-center">
    <h2>Siap Berlatih Lebih Keras?</h2>
    <p>Dapatkan peralatan terbaik untuk mendukung perjalanan Taekwondo Anda</p>
    <a href="pemesanan.php" class="btn btn-primary-custom">Pesan Sekarang</a>
  </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
