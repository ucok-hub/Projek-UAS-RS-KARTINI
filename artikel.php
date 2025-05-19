<?php 
session_start(); ?>
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
        <a href="poli.php">Poliklinik</a>
        <a href="fasilitas.php">Fasilitas</a>
        <a href="artikel.php">Artikel</a>
        <a href="profil.php">Tentang Kami</a>
        <?php if (isset($_SESSION['nama'])): ?>
            <span style="margin-right: 10px;">Halo, <?= htmlspecialchars($_SESSION['nama']) ?></span>
            <a href="logout.php"><button class="btn-daftar">Logout</button></a>
        <?php else: ?>
            <a href="register.html"><button class="btn-daftar">Daftar</button></a>
        <?php endif; ?>
        </nav>
  </header>
<!--Navbar End-->
<div class="container">
    <!-- Artikel Kiri -->
    <article class="Artikel">
      <h1 class="title">Mitos Seputar CAPD (Continuous Ambulatory Peritoneal Dialysis)</h1>
      <span class="badge">Penyakit Tidak Menular</span>
      <p class="author">
        <i class="icon">👤</i> Ns. I Gusti Putu Jayanti, S.Kep, dr. Anindia Larasati, Sp.PD
        <span class="date">📅 2025-03-19</span>
      </p>
      <p class="content">
        <strong>CAPD</strong> (Continuous Ambulatory <em>Peritoneal Dialysis</em>) atau dialisis peritoneal merupakan salah satu metode cuci darah yang dilakukan melalui <strong>rongga perut atau peritoneum</strong> dan bisa dilakukan di rumah...
      </p>
      <button onclick="readMore()">Selengkapnya</button>
      <p class="views">👁️ 503</p>
    </article>
  
    <!-- Sidebar Kanan -->
    <aside class="sidebar">
      <div class="search-box">
        <input type="text" placeholder="Cari artikel..." />
        <button>🔍</button>
      </div>
      <div class="categories">
        <h3>Kategori</h3>
        <ul>
          <li><a href="#">Gizi dan Nutrisi</a></li>
          <li><a href="#">Penyakit Tidak Menular</a></li>
          <li><a href="#">Kesehatan Mental</a></li>
          <li><a href="#">Ibu dan Anak</a></li>
          <li><a href="#">Lansia</a></li>
        </ul>
      </div>
      <div class="content" id="content-area">
          <!-- Content will be loaded by JS -->
        </div>
    </aside>
  </div>
  
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
    <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Fitria Andriana Sari, Desna Romana</p>
  </div>
</footer>

<!-- Script JS -->
<script>
  function initialize() {
    var koordinatTujuan = { lat: -6.238077422724989, lng: 106.7691991230291 }; // RS Kartini
    var propertiPeta = { 
      center: koordinatTujuan,
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    var marker = new google.maps.Marker({
      position: koordinatTujuan,
      map: peta,
      title: "Rumah Sakit Kartini"
    });
  }
</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
</script>
<!--Script Js-->
  <script src="script.js"></script>
</body>
</html>