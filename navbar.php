<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">HILMAN <span>SPORT</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="pemesanan.php">Pemesanan</a></li>
        <li class="nav-item"><a class="nav-link" href="data_pesanan.php">Data Pesanan</a></li>
        <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
// Highlight active nav
document.querySelectorAll('.nav-link').forEach(link => {
  if(link.href === window.location.href) link.classList.add('active');
});
</script>
