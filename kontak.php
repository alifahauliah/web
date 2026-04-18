<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak - Hilman Sport</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<?php
$sent = false;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sent = true;
}
?>

<section class="page-hero">
  <div class="container">
    <span class="section-tag">HUBUNGI KAMI</span>
    <h1>KONTAK</h1>
    <p>Ada pertanyaan? Kami siap membantu Anda</p>
  </div>
</section>

<section class="form-section">
  <div class="container">

    <!-- CONTACT INFO -->
    <div class="row g-4 mb-5">
      <?php
      $contacts = [
        ["📍","Lokasi","Lihat Lokasi di Maps","https://maps.app.goo.gl/jYrYvWFYVUkdBxRQ7"],
        ["💬","WhatsApp","0813-8602-8888","https://wa.me/+628138602888"],
        ["✉️","Email","hilmansport1975@gmail.com","mailto:hilmansport1975@gmail.com"],
        ["⏰","Jam Operasional","Senin–Sabtu: 08.00–20.00 WIB",""],
      ];
      foreach($contacts as $c): ?>
      <div class="col-md-3 col-sm-6">
        <div class="contact-card" <?= $c[3] ? 'onclick="window.open(\''.$c[3].'\',\'_blank\')" style="cursor:pointer;transition:all 0.2s;" onmouseover="this.style.transform=\'translateY(-4px)\'" onmouseout="this.style.transform=\'\'"' : '' ?>>
          <span class="contact-icon"><?= $c[0] ?></span>
          <h5><?= $c[1] ?></h5>
          <p style="color:var(--<?= $c[3] ? 'secondary' : 'gray' ?>);font-size:0.9rem;margin:0;"><?= $c[2] ?></p>
          <?php if($c[3]): ?><small style="color:var(--gray);font-size:0.75rem;">klik untuk membuka →</small><?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-7">

        <?php if($sent): ?>
        <div style="background:#e8f5e9;border:1px solid #66bb6a;color:#2e7d32;padding:20px;border-radius:8px;font-weight:600;margin-bottom:24px;">
          ✅ Pesan berhasil dikirim! Kami akan membalas dalam 1x24 jam.
        </div>
        <?php endif; ?>

        <div class="form-card">
          <h3 style="font-family:'Bebas Neue',cursive;letter-spacing:2px;color:var(--primary);font-size:1.8rem;margin-bottom:24px;">
            ✉️ Kirim Pesan
          </h3>
          <form method="POST">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nama Lengkap *</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Anda" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" name="email" placeholder="email@example.com" required>
              </div>
              <div class="col-12">
                <label class="form-label">Subjek</label>
                <select class="form-select" name="subjek">
                  <option>Pertanyaan Produk</option>
                  <option>Status Pesanan</option>
                  <option>Komplain</option>
                  <option>Kerjasama / Reseller</option>
                  <option>Lainnya</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Pesan *</label>
                <textarea class="form-control" name="pesan" rows="5" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
              </div>
              <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary-custom w-100" style="padding:16px;font-size:1rem;">
                  ✉️ Kirim Pesan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- SOCIAL MEDIA -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
.sosmed-card {
  background: rgba(255,255,255,0.1);
  border-radius: 12px;
  padding: 24px 28px;
  color: white;
  min-width: 150px;
  text-decoration: none;
  display: inline-block;
  transition: all 0.25s;
  border: 2px solid transparent;
}
.sosmed-card:hover {
  background: rgba(255,255,255,0.2);
  border-color: var(--accent);
  transform: translateY(-6px);
  color: white;
}
.sosmed-card .fa-brands { font-size: 2.2rem; margin-bottom: 10px; display: block; }
.sosmed-card .sosmed-name { font-weight: 700; letter-spacing: 1px; font-size: 0.85rem; }
.sosmed-card .sosmed-handle { color: #a8c0e0; font-size: 0.78rem; margin-top: 4px; }
.fa-instagram { color: #E1306C; }
.fa-tiktok { color: #ffffff; }
.fa-facebook { color: #1877F2; }
.fa-whatsapp { color: #25D366; }
</style>
<section style="background:var(--primary);padding:60px 0;text-align:center;">
  <div class="container">
    <span class="section-tag" style="color:var(--accent);">IKUTI KAMI</span>
    <h2 style="font-family:'Bebas Neue',cursive;color:white;letter-spacing:3px;font-size:2.5rem;margin:8px 0 24px;">MEDIA SOSIAL</h2>
    <div style="display:flex;justify-content:center;gap:20px;flex-wrap:wrap;">
      <a href="https://www.instagram.com/hilmansports?igsh=dmJsdzd5bGJmenI2" target="_blank" class="sosmed-card">
        <i class="fa-brands fa-instagram"></i>
        <div class="sosmed-name">Instagram</div>
        <div class="sosmed-handle">@hilmansports</div>
      </a>
      <a href="https://www.tiktok.com/@hilmansport_official?_r=1&_t=ZS-95d0vdsNJJd" target="_blank" class="sosmed-card">
        <i class="fa-brands fa-tiktok"></i>
        <div class="sosmed-name">TikTok</div>
        <div class="sosmed-handle">@hilmansport_official</div>
      </a>
      <a href="https://wa.me/+6281386028888" target="_blank" class="sosmed-card">
        <i class="fa-brands fa-whatsapp"></i>
        <div class="sosmed-name">WhatsApp</div>
        <div class="sosmed-handle">0813-8602-8888</div>
      </a>
      <a href="https://www.facebook.com/share/1NdS4fxmeg/" target="_blank" class="sosmed-card">
        <i class="fa-brands fa-facebook"></i>
        <div class="sosmed-name">Facebook</div>
        <div class="sosmed-handle">Hilman Sport</div>
      </a>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>