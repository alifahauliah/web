<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami - Hilman Sport</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="page-hero">
  <div class="container">
    <span class="section-tag">PROFIL KAMI</span>
    <h1>TENTANG HILMAN SPORT</h1>
    <p>Mitra terpercaya para atlet Taekwondo Indonesia</p>
  </div>
</section>

<section class="about-section">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-5">
        <img src="1.jpeg" alt="Hilman Sport" style="width:100%;border-radius:12px;object-fit:cover;height:400px;">
      </div>
      <div class="col-md-7">
        <span class="section-tag">SEJARAH KAMI</span>
        <h2 class="section-title">Berdiri Sejak 2020</h2>
        <p style="color:var(--gray);line-height:1.9;margin:20px 0;">
          Hilman Sport lahir dari kecintaan terhadap olahraga bela diri Taekwondo. 
          Berawal dari toko kecil di Surabaya, kini kami telah melayani ribuan atlet 
          dari Sabang sampai Merauke.
        </p>
        <p style="color:var(--gray);line-height:1.9;margin-bottom:30px;">
          Kami berkomitmen menyediakan peralatan Taekwondo berstandar WTF dan ITF 
          dengan harga yang terjangkau untuk semua kalangan — dari pemula hingga 
          atlet nasional.
        </p>
        <div class="row g-3">
          <?php
          $values = [
            ["🏆","Kualitas Terjamin","Semua produk bersertifikasi resmi WTF/ITF"],
            ["💰","Harga Terbaik","Harga kompetitif langsung dari distributor resmi"],
            ["🚀","Pengiriman Cepat","Siap kirim ke seluruh Indonesia dalam 1-3 hari"],
            ["💬","Support 24/7","Tim kami siap membantu kapanpun Anda butuh"],
          ];
          foreach($values as $v): ?>
          <div class="col-12">
            <div class="value-card">
              <h5><?= $v[0] ?> <?= $v[1] ?></h5>
              <p style="color:var(--gray);font-size:0.9rem;margin:0;"><?= $v[2] ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TEAM -->
<section style="background:var(--light);padding:60px 0;">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-tag">TIM KAMI</span>
      <h2 class="section-title">Orang-Orang di Balik Hilman Sport</h2>
    </div>
    <div class="row justify-content-center g-4">
      <?php
      $team = [
        ["👨‍💼","Hilman Kristian","Founder & CEO","Sabuk Hitam Dan 5, 30+ tahun berpengalaman"],
        ["👩‍💼","Alifah Auliah","Manajer Operasional","Ahli logistik & customer service"],
        ["👨‍🔧","Daud Muhammad","Kepala Gudang","Spesialis inventaris & kualitas produk"],
      ];
      foreach($team as $t): ?>
      <div class="col-md-4 col-sm-6">
        <div class="product-card">
          <div style="font-size:4rem;margin-bottom:16px;"><?= $t[0] ?></div>
          <h5><?= $t[1] ?></h5>
          <p style="color:var(--secondary);font-weight:600;font-size:0.85rem;margin-bottom:8px;"><?= $t[2] ?></p>
          <p style="color:var(--gray);font-size:0.85rem;"><?= $t[3] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
