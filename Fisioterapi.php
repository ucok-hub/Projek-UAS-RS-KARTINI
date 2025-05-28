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

<section>
    <div class="judul-container">
         <h1>RADIOLOGI</h1>
      </div>
  <div class="garis-aktif"></div>

  <div class="container">
    <div class="image">
      <img src="your-image.jpg" alt="Dokter kandungan sedang memeriksa pasien" />
    </div>

    <div class="content">
      <h2>Deskripsi</h2>
      <p class="description">
     Layanan Radiologi di RSU Kartini Jakarta menyediakan pemeriksaan pencitraan medis lengkap dan akurat untuk mendukung proses diagnosis dan perencanaan pengobatan pasien. Dengan tim radiografer profesional dan teknologi mutakhir, kami mampu mendeteksi berbagai kondisi medis sejak dini secara non-invasif dan minim risiko.

Radiologi memainkan peran penting dalam berbagai bidang, termasuk penyakit dalam, bedah, ortopedi, neurologi, onkologi, dan kandungan. Layanan ini terbuka bagi pasien rawat jalan, rawat inap, dan pemeriksaan rujukan dari fasilitas kesehatan lain.
      </p>

      <h2>Ruang Lingkup Pelayanan</h2>
      <h3>Kami menyediakan layanan radiologi digital yang cepat, aman, dan akurat, meliputi:</h3>
      <ol>
        <li>Rehabilitasi pasca stroke</li>
        <li>Terapi cedera olahraga</li>
        <li>Fisioterapi ortopedi (tulang & sendi)</li>
        <li>Terapi anak dengan keterlambatan motorik</li>
      </ol>
    </div>
  </div>
  <!-- Dropdown Area -->
<div class="dropdown-section">
  <details>
    <summary><h2>Layanan Unggulan</h2></summary>
    <ol>
        <li>Terapi mobilisasi dan latihan fungsional</li>
        <li>Terapi elektro (TENS, ultrasound)</li>
        <li>Home care fisioterapi</li>
    </ol>
  </details>

  <details>
    <summary><h2>Fasilitas dan Teknologi</h2></summary>
    <ol>
        <li>Ruang tunggu ramah anak</li>
        <li>Alat Doppler fetal</li>
        <li>Edukasi multimedia untuk ibu hamil</li>
    </ol>
  </details>

  <details>
    <summary><h2>Dokter Spesialis Kandungan</h2></summary>
    <ol>
      <li>dr. Daisy Widiastuti Wijaya, Sp.A</li>
    </ol>
  </details>
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