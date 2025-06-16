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
    <button class="carousel-multi-btn next" onclick="moveMultiCarousel(1)">&#10095;</button>
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
<script>
let multiCarouselIndexRawat = 0;
const visibleCountRawat = 3;
function showMultiCarouselRawat(idx) {
  const items = document.querySelectorAll('.carousel-multi-item-rawat');
  const total = items.length;
  if (!items.length) return;
  if (idx < 0) multiCarouselIndexRawat = total - visibleCountRawat;
  else if (idx > total - visibleCountRawat) multiCarouselIndexRawat = 0;
  else multiCarouselIndexRawat = idx;
  items.forEach(item => item.style.display = 'none');
  for (let i = 0; i < visibleCountRawat; i++) {
    let showIdx = multiCarouselIndexRawat + i;
    if (showIdx >= total) showIdx -= total;
    items[showIdx].style.display = 'block';
  }
}
function moveMultiCarouselRawat(dir) {
  showMultiCarouselRawat(multiCarouselIndexRawat + dir);
}
document.addEventListener('DOMContentLoaded', function() {
  showMultiCarouselRawat(0);
});
</script>
<style>
.carousel-multi-gallery {
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  margin: 0 auto;
  max-width: 800px;
  width: 100%;
}
.carousel-multi-btn {
  background: rgba(255, 255, 255, 0.8);
  border: none;
  border-radius: 50%;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 40px;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 40px;
  z-index: 10;
}
.carousel-multi-btn.prev {
  left: -20px;
}
.carousel-multi-btn.next {
  right: -20px;
}
.carousel-multi-track {
  display: flex;
  transition: transform 0.3s ease;
}
.carousel-multi-item-rawat {
  flex: 0 0 260px;
  max-width: 260px;
  display: none;
  transition: opacity 0.3s;
}
.carousel-multi-item-rawat img {
  width: 100%;
  height: 170px;
  object-fit: cover;
  border-radius: 14px;
  box-shadow: 0 2px 12px rgba(44,120,220,0.08);
  background: #f2f2f2;
  display: block;
}
@media (max-width: 900px) {
  .carousel-multi-item-rawat {
    flex: 0 0 90vw;
    max-width: 90vw;
  }
}
@media (max-width: 600px) {
  .carousel-multi-item-rawat img {
    height: 110px;
  }
}
</style>
</body>
</html>