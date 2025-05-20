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

<!--Navbar woiiiii-->
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
  <div class="artikel-list">
    <!-- Artikel Cards 1-->
    <article class="artikel-card">
      <h1 class="title">Pentingnya Imunisasi Dasar Lengkap bagi Anak</h1>
      <span class="badge">Kesehatan Anak</span>
      <p class="author">
        <i class="icon">👤</i> dr. Yuni Astari, Sp.A
        <span class="date">📅 2025-05-19</span>
      </p>
      <p class="content">
        <strong>Imunisasi</strong> Imunisasi merupakan langkah pencegahan utama terhadap penyakit infeksi yang berbahaya pada anak. Imunisasi dasar lengkap harus diberikan sesuai jadwal sejak bayi baru lahir agar tubuh anak membentuk kekebalan optimal terhadap berbagai penyakit seperti hepatitis B, polio, campak, difteri, pertusis, dan tetanus.
      </p>
      <button onclick="readMore()">Selengkapnya</button>
      <p class="views">👁️ 503</p>
    </article>

     <!-- Artikel Cards 2-->
    <article class="artikel-card">
      <h1 class="title">Menjaga Kesehatan Gigi Sejak Dini untuk Mencegah Karies</h1>
      <span class="badge">Kesehatan Gigi</span>
      <p class="author">
        <i class="icon">👤</i> drg. M. Rifky Syarif, Sp.KGA
        <span class="date">📅 2025-03-19</span>
      </p>
      <p class="content">
        Kesehatan gigi dan mulut adalah bagian penting dari kesehatan umum. Sayangnya, karies gigi (gigi berlubang) masih menjadi masalah utama di Indonesia, terutama pada anak-anak usia sekolah. Karies sering kali tidak menimbulkan gejala awal, namun jika dibiarkan, dapat menyebabkan nyeri, infeksi, hingga kehilangan gigi.
      </p>
      <button onclick="readMore()">Selengkapnya</button>
      <p class="views">👁️ 503</p>
    </article>

     <!-- Artikel Cards 3-->
    <article class="artikel-card">
      <h1 class="title">Tips Kehamilan Sehat: Panduan untuk Ibu dan Janin</h1>
      <span class="badge">Tips Kehamilan</span>
      <p class="author">
        <i class="icon">👤</i>dr. Hilda R. Kusuma, Sp.OG
        <span class="date">📅 2024-06-19</span>
      </p>
      <p class="content">
        Kehamilan adalah masa yang istimewa sekaligus menantang bagi seorang wanita. Perubahan hormon, fisik, hingga emosi terjadi dalam waktu singkat. Oleh karena itu, menjaga kehamilan tetap sehat sangat penting untuk kesejahteraan ibu dan tumbuh kembang janin.
      <button onclick="readMore()">Selengkapnya</button>
      <p class="views">👁️ 503</p>
    </article>
  </div>
  <aside class="sidebar">
    <div class="search-box">
      <input type="text" placeholder="Cari artikel..." />
      <button>🔍</button>
    </div>
    <div class="categories">
      <h3>Kategori</h3>
      <ul>
        <li><a href="#">Anak</a></li>
        <li><a href="#">Kandungan</a></li>
        <li><a href="#">Bedah</a></li>
        <li><a href="#">Gigi</a></li>
        <li><a href="#">Penyakit Dalam</a></li>
      </ul>
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