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

<!-- Judul Section -->
<div style="width:100%; background:##f47b20; min-height:220px; display:flex; align-items:center; justify-content:center; position:relative; margin-bottom:36px; border-radius:28px; overflow:hidden;">
  <div style="position:absolute; left:0; top:0; width:100%; height:100%; background:rgba(22, 120, 109, 0.78); z-index:1;"></div>
  <div style="position:relative; z-index:2; text-align:center; width:100%; color:#fff;">
     <div style="font-size:1.1rem; margin-bottom:10px; opacity:0.85;">Fasilitas</div>
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Rawat Inap</h1>
  </div>
  <img src="Asset/" alt="Header Rawat Inap" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

<section>

  <div class="judul-detail-content">
    <h2>Deskripsi</h2>
    <p>
      Layanan Rawat Inap RSU Kartini Jakarta menyediakan kamar perawatan yang nyaman, bersih, dan dilengkapi fasilitas modern untuk mendukung proses penyembuhan pasien. Setiap kamar dirancang untuk memberikan privasi dan keamanan, serta diawasi oleh tenaga medis profesional 24 jam.
    </p>

    <h2>Fasilitas dan Teknologi</h2>
    <ul>
      <li>Kamar perawatan VIP, kelas 1, 2, dan 3</li>
      <li>Tempat tidur elektrik dan fasilitas penunjang pasien</li>
      <li>AC, TV, kamar mandi dalam</li>
      <li>Ruang tunggu keluarga yang nyaman</li>
      <li>Pelayanan gizi dan kebersihan kamar</li>
      <li>Monitoring pasien 24 jam</li>
    </ul>

    <h2>Gambar yang Disarankan</h2>
    <div class="carousel-multi-gallery">
  <button class="carousel-multi-btn prev" onclick="moveMultiCarouselRawat(-1)">&#10094;</button>
  <div class="carousel-multi-track" id="carouselMultiTrackRawat" data-position="0">
    <div class="carousel-multi-item-rawat carousel-multi-item"><img src="Asset/Rawat Inap 1.jpg" alt="Rawat Inap 1" /></div>
    <div class="carousel-multi-item-rawat carousel-multi-item"><img src="Asset/Rawat Inap 2.jpg" alt="Rawat Inap 2" /></div>
    <div class="carousel-multi-item-rawat carousel-multi-item"><img src="Asset/Rawat Inap 3.jpg" alt="Rawat Inap 3" /></div>
  </div>
  <button class="carousel-multi-btn next" onclick="moveMultiCarouselRawat(1)">&#10095;</button>
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
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLOnIH6a2nwyw0bFaXXSphOdCcuh39w1o&callback=initialize">
</script>
<script src="script.js"></script>
</body>
</html>