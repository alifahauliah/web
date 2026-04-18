<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk - Hilman Sport</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    .cat-card { cursor: pointer; transition: all 0.2s; padding: 20px; }
    .cat-card:hover { transform: translateY(-4px); border-color: var(--secondary); }
    .cat-card.active { border: 2px solid var(--secondary); background: var(--primary); }
    .cat-card.active h5 { color: white; }
    .cat-card.active small { color: #a8c0e0 !important; }
    tbody tr.hidden { display: none; }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="page-hero">
  <div class="container">
    <span class="section-tag">KATALOG</span>
    <h1>DAFTAR PRODUK</h1>
    <p>Semua peralatan Taekwondo berkualitas tersedia di sini</p>
  </div>
</section>

<section class="table-section">
  <div class="container">

    <!-- FILTER CARDS -->
    <div class="row g-3 mb-5">
      <div class="col-md-3 col-6">
        <div class="product-card cat-card" data-cat="Dobok & Seragam" onclick="filterKategori(this)">
          <div class="product-icon" style="font-size:2rem;">🥋</div>
          <h5 style="font-size:1rem;">Dobok & Seragam</h5>
          <small style="color:var(--gray);">10 Produk</small>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card cat-card" data-cat="Pelindung Tubuh" onclick="filterKategori(this)">
          <div class="product-icon" style="font-size:2rem;">🛡️</div>
          <h5 style="font-size:1rem;">Pelindung Tubuh</h5>
          <small style="color:var(--gray);">17 Produk</small>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card cat-card" data-cat="Alat Latihan" onclick="filterKategori(this)">
          <div class="product-icon" style="font-size:2rem;">🥊</div>
          <h5 style="font-size:1rem;">Alat Latihan</h5>
          <small style="color:var(--gray);">11 Produk</small>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card cat-card" data-cat="Sabuk & Aksesori" onclick="filterKategori(this)">
          <div class="product-icon" style="font-size:2rem;">🎽</div>
          <h5 style="font-size:1rem;">Sabuk & Aksesori</h5>
          <small style="color:var(--gray);">12 Produk</small>
        </div>
      </div>
    </div>

    <!-- PRODUCT TABLE -->
    <div class="section-header mb-4 d-flex justify-content-between align-items-end flex-wrap gap-2">
      <div>
        <span class="section-tag">INVENTARIS</span>
        <h2 class="section-title" id="tabel-title">Tabel Semua Produk</h2>
      </div>
      <button onclick="resetFilter()" id="btn-reset" class="btn btn-outline-secondary btn-sm" style="display:none;font-size:0.8rem;letter-spacing:1px;margin-bottom:8px;">✕ Tampilkan Semua</button>
    </div>

    <div class="custom-table">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody id="tbody-produk">
          <?php
          $produk = [
            // Dobok & Seragam (10)
            [1,"Dobok Pemula HS","Dobok & Seragam","Rp 175.000",15,"Ada"],
            [2,"Dobok Pemula Empro","Dobok & Seragam","Rp 300.000",20,"Ada"],
            [3,"Dobok Black Neck HS","Dobok & Seragam","Rp 400.000",8,"Ada"],
            [4,"Dobok Fighter Pemula HS","Dobok & Seragam","Rp 250.000",25,"Ada"],
            [5,"Dobok Poomsae Cadet HS","Dobok & Seragam","Rp 350.000",20,"Ada"],
            [6,"Dobok Poomsae Senior HS","Dobok & Seragam","Rp 400.000",12,"Ada"],
            [7,"Dobok Olympic HS","Dobok & Seragam","Rp 600.000",12,"Ada"],
            [8,"Dobok Olympic JAQ","Dobok & Seragam","Rp 750.000",18,"Ada"],
            [9,"Dobok Black Neck Adidas","Dobok & Seragam","Rp 700.000",35,"Ada"],
            [10,"Dobok Black Neck Tusah","Dobok & Seragam","Rp 700.000",0,"Habis"],
            // Pelindung Tubuh (17)
            [11,"HS Body Protector","Pelindung Tubuh","Rp 250.000",12,"Ada"],
            [12,"Empro Body Protector","Pelindung Tubuh","Rp 350.000",10,"Ada"],
            [13,"MTX Body Protector","Pelindung Tubuh","Rp 475.000",0,"Habis"],
            [14,"Adidas Body Protector","Pelindung Tubuh","Rp 590.000",5,"Ada"],
            [15,"HS Guard","Pelindung Tubuh","Rp 400.000",10,"Ada"],
            [16,"JAQ Head Guard","Pelindung Tubuh","Rp 400.000",14,"Ada"],
            [17,"Empro Head Guard","Pelindung Tubuh","Rp 400.000",9,"Ada"],
            [18,"MTX Head Guard","Pelindung Tubuh","Rp 500.000",7,"Ada"],
            [19,"Mooto Head Guard","Pelindung Tubuh","Rp 550.000",11,"Ada"],
            [20,"HS Face Shield","Pelindung Tubuh","Rp 150.000",6,"Ada"],
            [21,"HS Forearm & Shin Guard","Pelindung Tubuh","Rp 250.000",30,"Ada"],
            [22,"Empro Forearm & Shin Guard","Pelindung Tubuh","Rp 400.000",30,"Ada"],
            [23,"Hand Gloves","Pelindung Tubuh","Rp 175.000",50,"Ada"],
            [24,"Foot Protector","Pelindung Tubuh","Rp 175.000",30,"Ada"],
            [25,"E-Foot Socks KPNP","Pelindung Tubuh","Rp 1.975.000",20,"Ada"],
            [26,"HS Groin Protector Male","Pelindung Tubuh","Rp 175.000",20,"Ada"],
            [27,"HS Groin Protector Female","Pelindung Tubuh","Rp 150.000",20,"Ada"],
            // Alat Latihan (11)
            [28,"HS Target Single","Alat Latihan","Rp 125.000",30,"Ada"],
            [29,"HS Target Double","Alat Latihan","Rp 150.000",30,"Ada"],
            [30,"HS Target Box 15x30","Alat Latihan","Rp 250.000",5,"Ada"],
            [31,"HS Target Box 30x50","Alat Latihan","Rp 300.000",5,"Ada"],
            [32,"HS Target Box 40x60","Alat Latihan","Rp 350.000",5,"Ada"],
            [33,"HS Muaythai Target ","Alat Latihan","Rp 225.000",7,"Ada"],
            [34,"Reflex Punching Bag","Alat Latihan","Rp 1.250.000",3,"Ada"],
            [35,"HS Samsak Boxing 100cm","Alat Latihan","Rp 300.000",3,"Ada"],
            [36,"HS Samsak Boxing 120cm","Alat Latihan","Rp 350.000",3,"Ada"],
            [37,"Papan Kyukpa 6mm","Alat Latihan","Rp 10.000",300,"Ada"],
            [38,"Papan Kyukpa 9mm","Alat Latihan","Rp 12.000",300,"Ada"],
            // Sabuk & Aksesori (12)
            [39,"Black Belt","Sabuk & Aksesori","Rp 200.000",25,"Ada"],
            [40,"Red Belt","Sabuk & Aksesori","Rp 200.000",40,"Ada"],
            [41,"Colour Belt","Sabuk & Aksesori","Rp 25.000",100,"Ada"],
            [42,"Taekwondo Backpacks","Sabuk & Aksesori","Rp 300.000",5,"Ada"],
            [43,"Mooto Slippers","Sabuk & Aksesori","Rp 200.000",30,"Ada"],
            [44,"Mooto Spirit Shoes","Sabuk & Aksesori","Rp 1.500.000",10,"Ada"],
            [45,"HS Gum Shield","Sabuk & Aksesori","Rp 50.000",42,"Ada"],
            [46,"Empro Matras 3cm","Sabuk & Aksesori","Rp 285.000",100,"Ada"],
            [47,"Maestro Matras 3cm","Sabuk & Aksesori","Rp 265.000",100,"Ada"],
            [48,"Gantungan Kunci Taekwondo","Sabuk & Aksesori","Rp 10.000",30,"Ada"],
            [49,"Pin Taekwondo","Sabuk & Aksesori","Rp 25.000",100,"Ada"],
            [50,"Stiker Taekwondo","Sabuk & Aksesori","Rp 5.000",30,"Ada"],

          ];
          foreach($produk as $p):
            $statusClass = $p[5] == "Ada" ? "stok-ada" : "stok-habis";
          ?>
          <tr data-cat="<?= $p[2] ?>">
            <td><?= $p[0] ?></td>
            <td><strong><?= $p[1] ?></strong></td>
            <td><span style="color:var(--secondary);font-size:0.85rem;"><?= $p[2] ?></span></td>
            <td><strong style="color:var(--primary);"><?= $p[3] ?></strong></td>
            <td><?= $p[4] ?></td>
            <td><span class="badge-stok <?= $statusClass ?>"><?= $p[5] ?></span></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <p class="mt-3" style="color:var(--gray);font-size:0.85rem;" id="total-label">
      * Menampilkan semua <?= count($produk) ?> produk | Harga dapat berubah sewaktu-waktu
    </p>

  </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const totalSemua = <?= count($produk) ?>;

function filterKategori(el) {
  const cat = el.dataset.cat;

  // Klik yg sudah aktif = reset
  if (el.classList.contains('active')) {
    resetFilter();
    return;
  }

  // Aktifkan card yang dipilih
  document.querySelectorAll('.cat-card').forEach(c => c.classList.remove('active'));
  el.classList.add('active');

  // Filter baris tabel
  const rows = document.querySelectorAll('#tbody-produk tr');
  let count = 0, no = 1;
  rows.forEach(row => {
    if (row.dataset.cat === cat) {
      row.classList.remove('hidden');
      row.cells[0].textContent = no++;
      count++;
    } else {
      row.classList.add('hidden');
    }
  });

  document.getElementById('tabel-title').textContent = 'Produk: ' + cat;
  document.getElementById('total-label').textContent = '* Menampilkan ' + count + ' produk kategori ' + cat;
  document.getElementById('btn-reset').style.display = 'inline-block';
}

function resetFilter() {
  document.querySelectorAll('.cat-card').forEach(c => c.classList.remove('active'));
  const rows = document.querySelectorAll('#tbody-produk tr');
  let no = 1;
  rows.forEach(row => {
    row.classList.remove('hidden');
    row.cells[0].textContent = no++;
  });
  document.getElementById('tabel-title').textContent = 'Tabel Semua Produk';
  document.getElementById('total-label').textContent = '* Menampilkan semua ' + totalSemua + ' produk | Harga dapat berubah sewaktu-waktu';
  document.getElementById('btn-reset').style.display = 'none';
}
</script>
</body>
</html>
