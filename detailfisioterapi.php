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
  <div class="judul-detail">
    <div class="judul-detail-overlay">
      <p>Selamat Datang di</p>
      <h1>Fisioterapi</h1>
    </div>
  </div>

  <div class="judul-detail-content">
    <h2>Deskripsi</h2>
    <p>
      Unit Fisioterapi RSU Kartini Jakarta hadir untuk membantu pasien memulihkan fungsi tubuh akibat cedera, gangguan saraf, pasca operasi, dan kondisi kronis lainnya. Dengan pendekatan rehabilitatif dan preventif, fisioterapis kami akan mendampingi pasien dalam proses terapi gerak, terapi elektro, dan latihan fungsional yang disesuaikan secara individual.
    </p>

    <h2>Fasilitas dan Teknologi</h2>
    <ul>
      <li>Terapi Elektro (TENS, ultrasound, infrared)</li>
      <li>Ruang latihan dan rehabilitasi dengan peralatan lengkap</li>
      <li>Program latihan fungsional dan mobilisasi sendi</li>
      <li>Terapi anak (pediatric physiotherapy)</li>
      <li>Layanan fisioterapi home care</li>
    </ul>

    <h2>Gambar yang Disarankan</h2>
    <div class="image-gallery">
      <img src="Asset/Fisioterapi1.jpg" alt="Fisioterapi 1" />
      <img src="Asset/Fisioterapi2.jpg" alt="Fisioterapi 2" />
      <img src="Asset/Fisioterapi3.jpg" alt="Fisioterapi 3" />
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
