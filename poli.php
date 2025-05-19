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

<!--Navigasi Poli-->
<section class="poli-klinik">
  <h1>POLI KLINIK</h1>
  <div class="garis-aktif"></div>
  <div class="daftar-klinik">
    <ul>
      <li><a href="polikandungan.php">Klinik Kandungan</a></li>
      <li><a href="polianak.php">Klinik Anak</a></li>
      <li><a href="polibidan.php">Klinik Bidan</a></li>
      <li><a href="Fisioterapi.php">Fisioterapi</a></li>
      <li><a href="#">Klinik Bedah Umum</a></li>
      <li><a href="#">Klinik Umum</a></li>
      <li><a href="#">Klinik Penyakit Dalam</a></li>
      <li><a href="#">Klinik Gigi</a></li>
    </ul>
  </div>
</section>
<!--Navigasi Poli End-->


       <!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    
    <!-- Map -->
    <div class="footer-map">
      <div id="googleMap"></div>
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

    <!--Footer End-->

    <!--Script Js-->
    <script>
  function initialize() {
    var koordinatTujuan = { lat: -6.242204, lng: 106.782147 }; // Titik RS Kartini
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
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLOnIH6a2nwyw0bFaXXSphOdCcuh39w1o&callback=initialize">
</script>

<!--Script Js-->
  <script src="script.js"></script>
</body>
</html>