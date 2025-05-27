<?php 
session_start(); ?><!DOCTYPE html>
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

<section>
  <div class="judul-detail">
    <div class="judul-detail-overlay">
      <p>Selamat Datang di</p>
      <h1>Baby Spa</h1>
    </div>
  </div>

  <div class="judul-detail-content">
    <h2>Deskripsi</h2>
    <p>
      Baby Spa RSU Kartini Jakarta memberikan layanan perawatan bayi yang aman, nyaman, dan menyenangkan. Dengan fasilitas steril dan terapis profesional, Baby Spa membantu stimulasi tumbuh kembang, relaksasi, serta meningkatkan bonding antara ibu dan bayi.
    </p>

    <h2>Fasilitas dan Teknologi</h2>
    <ul>
      <li>Kolam renang bayi dengan air hangat dan steril</li>
      <li>Pijat bayi oleh terapis bersertifikat</li>
      <li>Ruang tunggu nyaman untuk orang tua</li>
      <li>Peralatan spa khusus bayi yang higienis</li>
      <li>Area bermain edukatif</li>
    </ul>

    <h2>Gambar yang Disarankan</h2>
    <div class="image-gallery">
      <img src="Asset/BabySpa1.jpg" alt="Baby Spa 1" />
      <img src="Asset/BabySpa2.jpg" alt="Baby Spa 2" />
      <img src="Asset/BabySpa3.jpg" alt="Baby Spa 3" />
    </div>
  </div>
</section>

<!--Footer-->
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-map">
          <div id="googleMap"></div>
        </div>
        <div class="footer-info">
          <p>
            Jalan Ciledug Raya No. 94-96, Cipulir, Kebayoran Lama,
            RT.13/RW.6,<br />
            Cipulir, Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota
            Jakarta 12230
          </p>
          <div class="footer-social">
            <a href="https://www.facebook.com/kartini.hospital.79/"
              ><img src="Asset/Logo-03.png" alt="Facebook"
            /></a>
            <a
              href="https://www.instagram.com/kartini.hospital?igsh=dDBsaGFnYm8xZ255 "
              ><img src="Asset/Logo-02.png" alt="Instagram"
            /></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Desna Romarta Tambun, Fitria Andriana Sari</p>
      </div>
    </footer>

    <!--Footer End-->
    
<!-- Script Google Maps API -->
<script>
  function initialize() {
    var koordinatTujuan = { lat: -6.242204, lng: 106.782147 }; // RS Kartini
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
<script src="script.js"></script>
</body>
</html>