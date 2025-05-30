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
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Fasilitas</h1>
  </div>
  <img src="Asset/Ruang HCU.jpg" alt="Header Artikel" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

 <!-- Fasilitas dan Pelayanan -->
<section>
  <div class="container">
    <div class="sidebar">
      <ul>
        <li class="active" onclick="showContent('fisioterapi', this)">Fisioterapi</li>
        <li onclick="showContent('radiologi', this)">Radiologi</li>
        <li onclick="showContent('lab', this)">Laboratorium</li>
        <li onclick="showContent('farmasi', this)">Farmasi</li>
        <li onclick="showContent('rawatinap', this)">Rawat Inap</li>
        <li onclick="showContent('babyspa', this)">Baby Spa</li>
      </ul>
    </div>
    <div class="content" id="content-area">
      <!-- Konten akan dimuat dengan JavaScript -->
    </div>
  </div>
</section>
<!-- Fasilitas dan Pelayanan End -->

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

<!--Script Js-->
  <script src="script.js"></script>
</body>
</html>