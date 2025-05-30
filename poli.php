<?php 
session_start(); ?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah Sakit Kartini</title>
  <link rel="stylesheet" href="home.css">
</head>
<body>

<!--Navbar-->
  <header>
    <div class="logo">
        <a href="home.php"><img src="Asset/Logo-Image 1.png" alt="Logo RS Kartini"></a>
      </div>
    <nav>
      <div class="dropdown">
        <a href="poli.php" class="dropbtn" tabindex="0">Poliklinik</a>
        <div class="dropdown-content">
          <a href="polikandungan.php">Klinik Kandungan</a>
          <a href="polianak.php">Klinik Anak</a>
          <a href="polibedah.php">Klinik Bedah Umum</a>
          <a href="polipd.php">Klinik Penyakit Dalam</a>
          <a href="poligigi.php">Klinik Gigi</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="fasilitas.php" class="dropbtn" tabindex="0">Fasilitas</a>
        <div class="dropdown-content">
          <a href="fasilitas.php#rawatinap">Rawat Inap</a>
          <a href="fasilitas.php#igd">IGD</a>
          <a href="fasilitas.php#radiologi">Radiologi</a>
          <a href="fasilitas.php#farmasi">Farmasi</a>
          <a href="fasilitas.php#ambulans">Ambulans</a>
        </div>
      </div>
      <a href="artikel.php">Artikel</a>
      <a href="profil.php">Tentang Kami</a>
      <?php if (isset($_SESSION['nama'])): ?>
            <a href="riwayat_pelayanan.php">Riwayat Pelayanan</a>
          <span style="margin-right: 10px;">Halo, <?= htmlspecialchars($_SESSION['nama']) ?></span>
          <a href="logout.php"><button class="btn-daftar">Logout</button></a>
      <?php else: ?>
          <a href="register.php"><button class="btn-daftar">Daftar</button></a>
      <?php endif; ?>
    </nav>
  </header>
<!--Navbar End-->
<!-- Judul Section -->
<div style="width:100%; background:##f47b20; min-height:220px; display:flex; align-items:center; justify-content:center; position:relative; margin-bottom:36px; border-radius:28px; overflow:hidden;">
  <div style="position:absolute; left:0; top:0; width:100%; height:100%; background:rgba(22, 120, 109, 0.78); z-index:1;"></div>
  <div style="position:relative; z-index:2; text-align:center; width:100%; color:#fff;">
     <div style="font-size:1.1rem; margin-bottom:10px; opacity:0.85;">Daftar</div>
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Poli Klinik</h1>
  </div>
  <img src="Asset/Artikel Anak.jpg" alt="Header Artikel" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>
<!--Navigasi Poli-->
<section class="poli-klinik">
  <div class="poli-card-grid">
    <a href="polikandungan.php" class="poli-card">
      <div class="poli-card-title">Klinik Kandungan</div>
      <div class="poli-card-desc">Pelayanan kesehatan ibu hamil, persalinan, dan kandungan.</div>
    </a>
    <a href="polianak.php" class="poli-card">
      <div class="poli-card-title">Klinik Anak</div>
      <div class="poli-card-desc">Perawatan kesehatan anak dan konsultasi tumbuh kembang.</div>
    </a>
    <a href="polibedah.php" class="poli-card">
      <div class="poli-card-title">Klinik Bedah Umum</div>
      <div class="poli-card-desc">Tindakan bedah umum dan konsultasi pra/pasca operasi.</div>
    </a>
    <a href="polipd.php" class="poli-card">
      <div class="poli-card-title">Klinik Penyakit Dalam</div>
      <div class="poli-card-desc">Penanganan penyakit dalam dewasa dan konsultasi spesialis.</div>
    </a>
    <a href="poligigi.php" class="poli-card">
      <div class="poli-card-title">Klinik Gigi</div>
      <div class="poli-card-desc">Perawatan gigi, mulut, dan konsultasi kesehatan gigi.</div>
    </a>
  </div>
</section>
<!--Navigasi Poli End-->

  <!-- Footer -->
    <footer class="footer">
      <div class="footer-container">

        <!-- Google Maps API -->
        <div class="footer-map">
          <div id="googleMap" style="width: 100%; height: 250px;"></div>
        </div>

        <!-- Footer Info -->
        <div class="footer-info">
          <p>
            Jalan Ciledug Raya No. 94-96, Cipulir, Kebayoran Lama,<br />
            RT.13/RW.6, Cipulir, Kby. Lama, Kota Jakarta Selatan,<br />
            Daerah Khusus Ibukota Jakarta 12230
          </p>
          <div class="footer-social">
            <a href="https://www.facebook.com/kartini.hospital.79/" target="_blank">
              <img src="Asset/Logo-03.png" alt="Facebook" />
            </a>
            <a href="https://www.instagram.com/kartini.hospital?igsh=dDBsaGFnYm8xZ255" target="_blank">
              <img src="Asset/Logo-02.png" alt="Instagram" />
            </a>
          </div>
        </div>

      </div>

      <div class="footer-bottom">
        <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Desna Romarta Tambun, Fitria Andriana Sari</p>
      </div>
    </footer>
    <!-- End Footer -->

    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
    </script>

<style>
nav {
  display: flex;
  align-items: center;
  gap: 8px;
  position: relative;
  z-index: 20;
}
nav .dropdown {
  position: relative;
  display: inline-block;
}
nav .dropbtn {
  text-decoration: none;
  color: #333;
  padding: 0 10px;
  background: none;
  border: none;
  font: inherit;
  cursor: pointer;
  display: inline-block;
  /* Prevent default blue highlight on click */
  outline: none;
}
nav .dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 180px;
  box-shadow: 0 8px 24px rgba(44,120,220,0.09);
  z-index: 100;
  border-radius: 8px;
  margin-top: 8px;
  padding: 8px 0;
  left: 0;
}
nav .dropdown-content a {
  color: #22314a;
  padding: 10px 18px;
  text-decoration: none;
  display: block;
  font-size: 1rem;
  border-radius: 4px;
  transition: background 0.15s;
  background: none;
}
nav .dropdown-content a:hover {
  background: #f5f7fa;
  color: #009688;
}
nav .dropdown:hover .dropdown-content,
nav .dropdown:focus-within .dropdown-content {
  display: block;
}
nav .dropdown:focus-within .dropbtn,
nav .dropdown:hover .dropbtn {
  color: #009688;
}
nav .dropdown-content a:active {
  background: #e0f2f1;
}
.poli-card-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-auto-rows: 1fr;
  gap: 32px;
  margin: 32px 0 0 0;
  max-width: 1100px;
  margin-left: auto;
  margin-right: auto;
}
.poli-card {
  background: #fff;
  border-radius: 22px;
  box-shadow: 0 4px 24px rgba(44,120,220,0.09);
  padding: 28px 18px 24px 18px;
  text-align: left;
  text-decoration: none;
  color: #22314a;
  display: flex;
  flex-direction: column;
  gap: 14px;
  transition: box-shadow 0.18s, background 0.18s;
  border: 2.5px solid transparent;
  min-height: 160px;
  max-height: 210px;
  align-items: center;
  justify-content: center;
}
.poli-card-title {
  font-size: 1.18rem;
  font-weight: 700;
  margin-bottom: 4px;
  text-align: center;
}
.poli-card-desc {
  font-size: 1rem;
  color: inherit;
  opacity: 0.92;
  text-align: center;
}
.poli-card:hover, .poli-card:focus {
  background: #009688;
  color: #fff;
  box-shadow: 0 8px 32px rgba(44,120,220,0.13);
  border: 2.5px solid #009688;
}
@media (max-width: 900px) {
  .poli-card-grid {
    grid-template-columns: 1fr 1fr;
    gap: 18px;
  }
}
@media (max-width: 600px) {
  .poli-card-grid {
    grid-template-columns: 1fr;
    gap: 14px;
  }
  .poli-card {
    padding: 14px 8px 12px 8px;
    border-radius: 14px;
    min-height: 120px;
    max-height: 180px;
  }
}
</style>
<!--Script Js-->
<script src="script.js"></script>
</body>
</html>