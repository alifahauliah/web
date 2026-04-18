<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pemesanan - Hilman Sport</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    /* MODAL OVERLAY */
    .modal-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(6,21,48,0.85);
      z-index: 9999;
      overflow-y: auto;
      padding: 30px 16px;
    }
    .modal-overlay.show { display: flex; align-items: flex-start; justify-content: center; }
    .modal-box {
      background: white;
      border-radius: 16px;
      width: 100%;
      max-width: 620px;
      padding: 36px;
      position: relative;
      margin: auto;
    }
    .modal-box h3 {
      font-family: 'Bebas Neue', cursive;
      font-size: 1.8rem;
      letter-spacing: 2px;
      color: var(--primary);
      margin-bottom: 4px;
    }
    /* STEP INDICATOR */
    .steps { display: flex; gap: 0; margin-bottom: 28px; }
    .step {
      flex: 1;
      text-align: center;
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      padding: 10px 6px;
      color: #aab;
      border-bottom: 3px solid #e0e8f5;
      transition: all 0.3s;
    }
    .step.active { color: var(--secondary); border-color: var(--secondary); }
    .step.done { color: #2e7d32; border-color: #66bb6a; }
    .step-content { display: none; }
    .step-content.active { display: block; }
    /* KURIR CARDS */
    .kurir-card {
      border: 2px solid #e0e8f5;
      border-radius: 10px;
      padding: 14px 16px;
      cursor: pointer;
      transition: all 0.2s;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .kurir-card:hover { border-color: var(--secondary); background: #f0f7ff; }
    .kurir-card.selected { border-color: var(--secondary); background: #e8f2ff; }
    .kurir-name { font-weight: 700; color: var(--primary); font-size: 0.95rem; }
    .kurir-est { font-size: 0.8rem; color: var(--gray); }
    .kurir-price { font-weight: 700; color: var(--secondary); font-size: 0.95rem; text-align: right; }
    /* BAYAR CARDS */
    .bayar-card {
      border: 2px solid #e0e8f5;
      border-radius: 10px;
      padding: 16px;
      cursor: pointer;
      transition: all 0.2s;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .bayar-card:hover { border-color: var(--secondary); background: #f0f7ff; }
    .bayar-card.selected { border-color: var(--secondary); background: #e8f2ff; }
    .bayar-icon { font-size: 2rem; min-width: 44px; text-align: center; }
    .bayar-name { font-weight: 700; color: var(--primary); }
    .bayar-desc { font-size: 0.8rem; color: var(--gray); }
    /* RINGKASAN */
    .ringkasan-row {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      font-size: 0.9rem;
      border-bottom: 1px solid #f0f0f0;
    }
    .ringkasan-row:last-child { border: none; }
    .ringkasan-row.total {
      font-weight: 700;
      font-size: 1.1rem;
      color: var(--primary);
      border-top: 2px solid var(--primary);
      padding-top: 12px;
      margin-top: 4px;
    }
    /* REKENING BOX */
    .rekening-box {
      background: #f0f7ff;
      border: 1px solid #b8d4f5;
      border-radius: 8px;
      padding: 16px;
      margin-top: 16px;
      display: none;
    }
    .rekening-box.show { display: block; }
    .rek-num {
      font-family: 'Bebas Neue', cursive;
      font-size: 1.6rem;
      letter-spacing: 3px;
      color: var(--primary);
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<?php
// Data produk: nama => [harga, berat_kg]
$dataProduk = [
  "Dobok Pemula HS"             => [175000, 0.5],
  "Dobok Pemula Empro"          => [300000, 0.5],
  "Dobok Black Neck HS"         => [400000, 0.55],
  "Dobok Fighter Pemula HS"     => [250000, 0.55],
  "Dobok Poomsae Cadet HS"      => [250000, 0.6],
  "Dobok Poomsae Senior HS"     => [400000, 0.65],
  "Dobok Olympic HS"            => [600000, 0.65],
  "Dobok Olympic JAQ"           => [750000, 0.65],
  "Dobok Black Neck Adidas"     => [700000, 0.6],
  "Dobok Black Neck Tusah"      => [700000, 0.6],
  "HS Body Protector"           => [250000, 0.8],
  "Empro Body Protector"        => [350000, 0.85],
  "MTX Body Protector"          => [475000, 0.9],
  "Adidas Body Protector"       => [590000, 0.9],
  "HS Guard"                    => [400000, 0.4],
  "JAQ Head Guard"              => [400000, 0.6],
  "Empro Head Guard"            => [400000, 0.65],
  "MTX Head Guard"              => [500000, 0.65],
  "Mooto Head Guard"            => [550000, 0.65],
  "HS Face Shield"              => [150000, 0.3],
  "HS Forearm & Shin Guard"     => [250000, 0.45],
  "Empro Forearm & Shin Guard"  => [400000, 0.5],
  "Hand Gloves"                 => [175000, 0.4],
  "Foot Protector"              => [175000, 0.5],
  "E-Foot Protector"            => [1975000, 0.6],
  "HS Groin Protector Male"     => [175000, 0.2],
  "HS Groin Protector Female"   => [150000, 0.2],
  "HS Target Single"            => [125000, 0.5],
  "HS Target Double"            => [150000, 0.9],
  "HS Target Box 15x30"         => [250000, 0.4],
  "HS Target Box 30x50"         => [300000, 0.8],
  "HS Target Box 40x60"         => [350000, 1.2],
  "HS Muaythai Target"          => [225000, 0.7],
  "Reflex Punching Bag"         => [1250000, 3.0],
  "HS Samsak Boxing 100cm"      => [300000, 8.0],
  "HS Samsak Boxing 120cm"      => [350000, 10.0],
  "Papan Kyukpa 6mm"            => [10000, 0.3],
  "Papan Kyukpa 9mm"            => [12000, 0.4],
  "Black Belt"                  => [200000, 0.15],
  "Red Belt"                    => [200000, 0.1],
  "Colour Belt"                 => [25000, 0.1],
  "Taekwondo Backpacks"         => [300000, 0.8],
  "Mooto Slippers"              => [200000, 0.4],
  "Mooto Spirit Shoes"          => [1500000, 0.7],
  "HS Gum Shield"               => [50000, 0.05],
  "Empro Matras 3cm"            => [285000, 5.0],
  "Maestro Matras 3cm"          => [265000, 5.5],
  "Gantungan Kunci Taekwondo"   => [10000, 0.05],
  "Pin Taekwondo"               => [25000, 0.02],
  "Stiker Taekwondo"            => [5000, 0.01],
];

$success = false;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama      = htmlspecialchars($_POST['nama']);
  $telepon   = htmlspecialchars($_POST['telepon']);
  $email     = htmlspecialchars($_POST['email'] ?? '');
  $produk    = htmlspecialchars($_POST['produk']);
  $ukuran    = htmlspecialchars($_POST['ukuran']);
  $jumlah    = intval($_POST['jumlah']);
  $alamat    = htmlspecialchars($_POST['alamat']);
  $catatan   = htmlspecialchars($_POST['catatan'] ?? '');
  $kurir     = htmlspecialchars($_POST['kurir'] ?? '-');
  $bayar     = htmlspecialchars($_POST['bayar'] ?? '-');
  $total     = htmlspecialchars($_POST['total'] ?? '0');
  $tanggal   = date("Y-m-d H:i:s");

  $file = 'data_pesanan.csv';
  $baru = !file_exists($file);
  $fp = fopen($file, 'a');
  if($baru) fputcsv($fp, ['Tanggal','Nama','Telepon','Email','Produk','Ukuran','Jumlah','Alamat','Kurir','Pembayaran','Total','Catatan']);
  fputcsv($fp, [$tanggal,$nama,$telepon,$email,$produk,$ukuran,$jumlah,$alamat,$kurir,$bayar,$total,$catatan]);
  fclose($fp);
  $success = true;
}

// Kirim data produk ke JS
$produkJS = json_encode($dataProduk);
?>

<section class="page-hero">
  <div class="container">
    <span class="section-tag">FORM ORDER</span>
    <h1>FORM PEMESANAN</h1>
    <p>Isi data pemesanan Anda dengan lengkap dan benar</p>
  </div>
</section>

<section class="form-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="form-card">
          <h3 style="font-family:'Bebas Neue',cursive;letter-spacing:2px;color:var(--primary);font-size:1.8rem;margin-bottom:24px;">
            🛒 Detail Pesanan
          </h3>

          <form id="formPesan" method="POST" action="pemesanan.php">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nama Lengkap *</label>
                <input type="text" class="form-control" name="nama" id="inp-nama" placeholder="Masukkan nama lengkap" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">No. Telepon / WhatsApp *</label>
                <input type="text" class="form-control" name="telepon" id="inp-telepon" placeholder="08xx-xxxx-xxxx" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inp-email" placeholder="email@example.com">
              </div>
              <div class="col-md-6">
                <label class="form-label">Produk yang Dipesan *</label>
                <select class="form-select" name="produk" id="inp-produk" onchange="updateHarga()" required>
                  <option value="">-- Pilih Produk --</option>
                  <option>Dobok Pemula HS</option>
                  <option>Dobok Pemula Empro</option>
                  <option>Dobok Black Neck HS</option>
                  <option>Dobok Fighter Pemula HS</option>
                  <option>Dobok Poomsae Cadet HS</option>
                  <option>Dobok Poomsae Senior HS</option>
                  <option>Dobok Olympic HS</option>
                  <option>Dobok Olympic JAQ</option>
                  <option>Dobok Black Neck Adidas</option>
                  <option>Dobok Black Neck Tusah</option>
                  <option>HS Body Protector</option>
                  <option>Empro Body Protector</option>
                  <option>MTX Body Protector</option>
                  <option>Adidas Body Protector</option>
                  <option>HS Guard</option>
                  <option>JAQ Head Guard</option>
                  <option>Empro Head Guard</option>
                  <option>MTX Head Guard</option>
                  <option>Mooto Head Guard</option>
                  <option>HS Face Shield</option>
                  <option>HS Forearm & Shin Guard</option>
                  <option>Empro Forearm & Shin Guard</option>
                  <option>Hand Gloves</option>
                  <option>Foot Protector</option>
                  <option>E-Foot Protector</option>
                  <option>HS Groin Protector Male</option>
                  <option>HS Groin Protector Female</option>
                  <option>HS Target Single</option>
                  <option>HS Target Double</option>
                  <option>HS Target Box 15x30</option>
                  <option>HS Target Box 30x50</option>
                  <option>HS Target Box 40x60</option>
                  <option>HS Muaythai Target</option>
                  <option>Reflex Punching Bag</option>
                  <option>HS Samsak Boxing 100cm</option>
                  <option>HS Samsak Boxing 120cm</option>
                  <option>Papan Kyukpa 6mm</option>
                  <option>Papan Kyukpa 9mm</option>
                  <option>Black Belt</option>
                  <option>Red Belt</option>
                  <option>Colour Belt</option>
                  <option>Taekwondo Backpacks</option>
                  <option>Mooto Slippers</option>
                  <option>Mooto Spirit Shoes</option>
                  <option>HS Gum Shield</option>
                  <option>Empro Matras 3cm</option>
                  <option>Maestro Matras 3cm</option>
                  <option>Gantungan Kunci Taekwondo</option>
                  <option>Pin Taekwondo</option>
                  <option>Stiker Taekwondo</option>
                </select>
              </div>
              <!-- Harga otomatis -->
              <div class="col-md-6">
                <label class="form-label">Harga Satuan</label>
                <input type="text" class="form-control" id="show-harga" placeholder="Pilih produk dulu" readonly style="background:#f8faff;color:var(--secondary);font-weight:700;">
              </div>
              <div class="col-md-6">
                <label class="form-label">Ukuran</label>
                <select class="form-select" name="ukuran" id="inp-ukuran">
                  <option value="-">Tidak Ada / Bebas</option>
                  <option>XS (Anak Kecil)</option>
                  <option>S (Anak Besar)</option>
                  <option>M (Dewasa Kecil)</option>
                  <option>L (Dewasa Sedang)</option>
                  <option>XL (Dewasa Besar)</option>
                  <option>XXL (Dewasa Jumbo)</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Jumlah *</label>
                <input type="number" class="form-control" name="jumlah" id="inp-jumlah" min="1" value="1" onchange="updateHarga()" required>
              </div>
              <!-- Subtotal -->
              <div class="col-12">
                <div style="background:#f0f7ff;border-radius:8px;padding:12px 16px;display:flex;justify-content:space-between;align-items:center;">
                  <span style="font-weight:600;color:var(--primary);">Subtotal Produk:</span>
                  <span id="show-subtotal" style="font-family:'Bebas Neue',cursive;font-size:1.4rem;color:var(--secondary);letter-spacing:1px;">Rp 0</span>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Alamat Pengiriman *</label>
                <textarea class="form-control" name="alamat" id="inp-alamat" rows="3" placeholder="Masukkan alamat lengkap pengiriman..." required></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Catatan Tambahan</label>
                <textarea class="form-control" name="catatan" id="inp-catatan" rows="2" placeholder="Warna, keterangan khusus, dll..."></textarea>
              </div>
              <!-- Hidden fields -->
              <input type="hidden" name="kurir" id="hid-kurir">
              <input type="hidden" name="bayar" id="hid-bayar">
              <input type="hidden" name="total" id="hid-total">
              <div class="col-12 mt-2">
                <button type="button" onclick="bukaModal()" class="btn btn-primary-custom w-100" style="padding:16px;font-size:1rem;">
                  Lanjut Pilih Pengiriman & Pembayaran →
                </button>
              </div>
            </div>
          </form>
        </div>

        <!-- INFO BOX -->
        <div class="row g-3 mt-2">
          <div class="col-md-4">
            <div class="contact-card">
              <span class="contact-icon">🚚</span>
              <h5>PENGIRIMAN</h5>
              <p style="font-size:0.85rem;color:var(--gray);">Gojek, JNT, JNE, SiCepat, Anteraja</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-card">
              <span class="contact-icon">💳</span>
              <h5>PEMBAYARAN</h5>
              <p style="font-size:0.85rem;color:var(--gray);">QRIS atau Transfer BCA</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-card">
              <span class="contact-icon">🔄</span>
              <h5>GARANSI</h5>
              <p style="font-size:0.85rem;color:var(--gray);">Garansi produk 7 hari sejak barang diterima</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ===== MODAL ===== -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">
    <div class="steps">
      <div class="step active" id="step-ind-1">1. Pengiriman</div>
      <div class="step" id="step-ind-2">2. Pembayaran</div>
      <div class="step" id="step-ind-3">3. Konfirmasi</div>
    </div>

    <!-- STEP 1: PENGIRIMAN -->
    <div class="step-content active" id="step1">
      <h3>🚚 Pilih Pengiriman</h3>
      <p style="color:var(--gray);font-size:0.85rem;margin-bottom:16px;">
        Berat paket: <strong id="show-berat">-</strong> kg &nbsp;|&nbsp; Ongkir dihitung per 500g
      </p>
      <div id="kurir-list"></div>
      <button onclick="keStep(2)" class="btn btn-primary-custom w-100 mt-3" id="btn-lanjut-kurir" disabled>
        Lanjut ke Pembayaran →
      </button>
    </div>

    <!-- STEP 2: PEMBAYARAN -->
    <div class="step-content" id="step2">
      <h3>💳 Pilih Pembayaran</h3>
      <p style="color:var(--gray);font-size:0.85rem;margin-bottom:16px;">Pilih metode pembayaran yang diinginkan</p>

      <div class="bayar-card" id="bayar-qris" onclick="pilihBayar('QRIS', this)">
        <div class="bayar-icon">📱</div>
        <div>
          <div class="bayar-name">QRIS</div>
          <div class="bayar-desc">Scan QR Code — semua e-wallet & m-banking</div>
        </div>
      </div>
      <div class="bayar-card" id="bayar-bca" onclick="pilihBayar('Transfer BCA', this)">
        <div class="bayar-icon">🏦</div>
        <div>
          <div class="bayar-name">Transfer Bank BCA</div>
          <div class="bayar-desc">Transfer ke rekening BCA Hilman Sport</div>
        </div>
      </div>

      <div class="rekening-box" id="rek-box">
        <div style="font-size:0.8rem;color:var(--gray);margin-bottom:4px;letter-spacing:1px;text-transform:uppercase;">No. Rekening BCA</div>
        <div class="rek-num">3731177773</div>
        <div style="font-size:0.85rem;color:var(--primary);font-weight:600;">a.n. Hilman Sport</div>
        <div style="font-size:0.8rem;color:var(--gray);margin-top:8px;">⚠️ Harap transfer sesuai total tagihan. Kirim bukti transfer via WhatsApp ke <strong>0813-8602-8888</strong></div>
      </div>

      <div style="display:flex;gap:10px;margin-top:20px;">
        <button onclick="keStep(1)" class="btn btn-outline-secondary w-50">← Kembali</button>
        <button onclick="keStep(3)" class="btn btn-primary-custom w-50" id="btn-lanjut-bayar" disabled>Lanjut →</button>
      </div>
    </div>

    <!-- STEP 3: KONFIRMASI -->
    <div class="step-content" id="step3">
      <h3>✅ Ringkasan Pesanan</h3>
      <p style="color:var(--gray);font-size:0.85rem;margin-bottom:20px;">Periksa kembali sebelum mengirim pesanan</p>
      <div id="ringkasan-detail"></div>
      <div style="display:flex;gap:10px;margin-top:20px;">
        <button onclick="keStep(2)" class="btn btn-outline-secondary w-50">← Kembali</button>
        <button onclick="submitPesanan()" class="btn btn-primary-custom w-50">🛒 Kirim Pesanan</button>
      </div>
    </div>

  </div>
</div>

<!-- SUCCESS MODAL -->
<div class="modal-overlay" id="modalSukses">
  <div class="modal-box" style="text-align:center;max-width:480px;">
    <div style="font-size:4rem;margin-bottom:16px;">🎉</div>
    <h3 style="text-align:center;">PESANAN DIKIRIM!</h3>
    <p style="color:var(--gray);margin:12px 0 24px;">Terima kasih! Tim Hilman Sport akan segera menghubungi Anda untuk konfirmasi.</p>
    <div style="background:#f0f7ff;border-radius:8px;padding:16px;margin-bottom:20px;text-align:left;" id="sukses-detail"></div>
    <a href="data_pesanan.php" class="btn btn-primary-custom w-100" style="margin-bottom:10px;">Lihat Data Pesanan</a>
    <a href="pemesanan.php" class="btn btn-outline-secondary w-100">Buat Pesanan Baru</a>
  </div>
</div>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const dataProduk = <?= $produkJS ?>;

// Tarif kurir: per 500g (dibulatkan ke atas)
const kurirList = [
  { id:'gojek-instant', nama:'Gojek Instant',  est:'Hari ini (~2 jam)',  tarifPer500g: 12000, icon:'🛵' },
  { id:'gojek-sameday', nama:'Gojek Same Day', est:'Hari ini (s/d 18.00)', tarifPer500g: 9000,  icon:'🛵' },
  { id:'jnt',           nama:'J&T Express',    est:'1-2 hari kerja',    tarifPer500g: 5000,  icon:'📦' },
  { id:'jne',           nama:'JNE REG',         est:'2-3 hari kerja',    tarifPer500g: 5500,  icon:'📦' },
  { id:'jne-yes',       nama:'JNE YES',         est:'1 hari kerja',      tarifPer500g: 8000,  icon:'⚡' },
  { id:'sicepat',       nama:'SiCepat REG',     est:'1-2 hari kerja',    tarifPer500g: 4500,  icon:'📦' },
  { id:'anteraja',      nama:'Anteraja',        est:'2-3 hari kerja',    tarifPer500g: 4000,  icon:'📦' },
];

let selectedKurir = null;
let selectedBayar = null;
let hargaSatuan = 0;
let beratSatuan = 0;

function formatRp(n) {
  return 'Rp ' + Math.round(n).toLocaleString('id-ID');
}

function hitungOngkir(beratKg, tarifPer500g) {
  const unit = Math.ceil(beratKg / 0.5);
  return unit * tarifPer500g;
}

function updateHarga() {
  const produk = document.getElementById('inp-produk').value;
  const jumlah = parseInt(document.getElementById('inp-jumlah').value) || 1;
  if (dataProduk[produk]) {
    hargaSatuan = dataProduk[produk][0];
    beratSatuan = dataProduk[produk][1];
    document.getElementById('show-harga').value = formatRp(hargaSatuan);
    document.getElementById('show-subtotal').textContent = formatRp(hargaSatuan * jumlah);
  } else {
    hargaSatuan = 0; beratSatuan = 0;
    document.getElementById('show-harga').value = '';
    document.getElementById('show-subtotal').textContent = 'Rp 0';
  }
}

function bukaModal() {
  const form = document.getElementById('formPesan');
  const nama = document.getElementById('inp-nama').value;
  const telepon = document.getElementById('inp-telepon').value;
  const produk = document.getElementById('inp-produk').value;
  const alamat = document.getElementById('inp-alamat').value;
  if (!nama || !telepon || !produk || !alamat) {
    alert('Harap isi semua field yang wajib (*)');
    return;
  }
  const jumlah = parseInt(document.getElementById('inp-jumlah').value) || 1;
  const beratTotal = beratSatuan * jumlah;

  // Render kurir
  document.getElementById('show-berat').textContent = beratTotal.toFixed(2);
  let html = '';
  kurirList.forEach(k => {
    const ongkir = hitungOngkir(beratTotal, k.tarifPer500g);
    html += `<div class="kurir-card" id="k-${k.id}" onclick="pilihKurir('${k.id}','${k.nama}',${ongkir},this)">
      <div>
        <div class="kurir-name">${k.icon} ${k.nama}</div>
        <div class="kurir-est">${k.est}</div>
      </div>
      <div class="kurir-price">${formatRp(ongkir)}</div>
    </div>`;
  });
  document.getElementById('kurir-list').innerHTML = html;
  selectedKurir = null;
  document.getElementById('btn-lanjut-kurir').disabled = true;
  document.getElementById('modalOverlay').classList.add('show');
  keStep(1);
}

function pilihKurir(id, nama, ongkir, el) {
  document.querySelectorAll('.kurir-card').forEach(c => c.classList.remove('selected'));
  el.classList.add('selected');
  selectedKurir = { id, nama, ongkir };
  document.getElementById('btn-lanjut-kurir').disabled = false;
}

function pilihBayar(nama, el) {
  document.querySelectorAll('.bayar-card').forEach(c => c.classList.remove('selected'));
  el.classList.add('selected');
  selectedBayar = nama;
  document.getElementById('btn-lanjut-bayar').disabled = false;
  document.getElementById('rek-box').classList.toggle('show', nama === 'Transfer BCA');
}

function keStep(n) {
  [1,2,3].forEach(i => {
    document.getElementById('step'+i).classList.toggle('active', i===n);
    const ind = document.getElementById('step-ind-'+i);
    ind.classList.remove('active','done');
    if (i === n) ind.classList.add('active');
    else if (i < n) ind.classList.add('done');
  });
  if (n === 3) renderRingkasan();
}

function renderRingkasan() {
  const produk = document.getElementById('inp-produk').value;
  const jumlah = parseInt(document.getElementById('inp-jumlah').value) || 1;
  const subtotal = hargaSatuan * jumlah;
  const ongkir = selectedKurir ? selectedKurir.ongkir : 0;
  const total = subtotal + ongkir;
  document.getElementById('hid-kurir').value = selectedKurir ? selectedKurir.nama : '-';
  document.getElementById('hid-bayar').value = selectedBayar || '-';
  document.getElementById('hid-total').value = total;
  document.getElementById('ringkasan-detail').innerHTML = `
    <div class="ringkasan-row"><span>Produk</span><span>${produk}</span></div>
    <div class="ringkasan-row"><span>Jumlah</span><span>${jumlah} pcs</span></div>
    <div class="ringkasan-row"><span>Harga Satuan</span><span>${formatRp(hargaSatuan)}</span></div>
    <div class="ringkasan-row"><span>Subtotal Produk</span><span>${formatRp(subtotal)}</span></div>
    <div class="ringkasan-row"><span>Pengiriman (${selectedKurir ? selectedKurir.nama : '-'})</span><span>${formatRp(ongkir)}</span></div>
    <div class="ringkasan-row"><span>Metode Bayar</span><span>${selectedBayar || '-'}</span></div>
    <div class="ringkasan-row total"><span>TOTAL</span><span>${formatRp(total)}</span></div>
  `;
}

function submitPesanan() {
  const produk = document.getElementById('inp-produk').value;
  const jumlah = parseInt(document.getElementById('inp-jumlah').value) || 1;
  const subtotal = hargaSatuan * jumlah;
  const ongkir = selectedKurir ? selectedKurir.ongkir : 0;
  const total = subtotal + ongkir;

  document.getElementById('hid-kurir').value = selectedKurir ? selectedKurir.nama : '-';
  document.getElementById('hid-bayar').value = selectedBayar || '-';
  document.getElementById('hid-total').value = total;

  // Kirim form via fetch
  const formData = new FormData(document.getElementById('formPesan'));
  fetch('pemesanan.php', { method: 'POST', body: formData })
    .then(() => {
      document.getElementById('modalOverlay').classList.remove('show');
      document.getElementById('sukses-detail').innerHTML = `
        <div style="font-size:0.85rem;">
          <b>Produk:</b> ${produk} (${jumlah} pcs)<br>
          <b>Kurir:</b> ${selectedKurir ? selectedKurir.nama : '-'}<br>
          <b>Pembayaran:</b> ${selectedBayar}<br>
          <b>Total:</b> <span style="color:var(--secondary);font-weight:700;">${formatRp(total)}</span>
        </div>`;
      document.getElementById('modalSukses').classList.add('show');
    });
}
</script>
</body>
</html>
