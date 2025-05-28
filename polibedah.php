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
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Klinik Bedah</h1>
  </div>
  <img src="Asset/Poli Bedah Umum.jpg" alt="Header Artikel" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

<section>
  <div class="container">
    <div class="image">
      <img src="Asset/Poli Bedah Umum.jpg" alt="Dokter sedang memeriksa pasien" />
    </div>

    <div class="content">
      <p class="description">
        Poli Bedah Umum RSU Kartini Jakarta menangani diagnosa dan konsultasi terkait tindakan bedah untuk berbagai penyakit, mulai dari ringan hingga kompleks.
      </p>
      <div class="dropdown-section">
        <details>
          <summary><h2>Ruang Lingkup Pelayanan</h2></summary>
          <ol>
            <li>Konsultasi dan evaluasi pra-operasi</li>
            <li>Penanganan luka infeksi dan abses</li>
            <li>Bedah minor (kista, lipoma, luka jahit)</li>
            <li>Tindakan bedah hernia, usus buntu, dan lainnya</li>
          </ol>
        </details>
        <details>
          <summary><h2>Layanan Unggulan</h2></summary>
          <ol>
              <li>Bedah one-day-care (rawat jalan)</li>
              <li>Luka operasi steril dan minim nyeri</li>
              <li>Konsultasi bedah dengan pendekatan minimal invasif</li>
          </ol>
        </details>
        <details>
          <summary><h2>Fasilitas dan Teknologi</h2></summary>
          <ol>
              <li>Kamar bedah minor steril</li>
              <li>Alat bedah modern dan efisien</li>
              <li>Pemantauan pra dan pasca tindakan</li>
          </ol>
        </details>
        <details>
          <summary><h2>Dokter Spesialis Bedah</h2></summary>
          <ol>
            <li>dr. Asian Edward Sagala, Sp.B</li>
            <li>dr. Andoko Budiwisesa, Sp.B</li>
          </ol>
        </details>
      </div>
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