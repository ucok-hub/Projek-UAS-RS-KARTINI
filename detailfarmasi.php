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
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Farmasi</h1>
  </div>
  <img src="Asset/Farmasi 1.jpg" alt="Header Farmasi" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

<section>

  <div class="judul-detail-content">
    <h2>Deskripsi</h2>
    <p>
      Instalasi Farmasi RSU Kartini Jakarta menyediakan pelayanan obat yang lengkap, aman, dan berkualitas untuk pasien rawat jalan maupun rawat inap. Didukung oleh apoteker profesional, Farmasi kami memastikan ketersediaan obat generik, paten, dan alat kesehatan sesuai standar.
    </p>

    <h2>Fasilitas dan Teknologi</h2>
    <ul>
      <li>Pelayanan resep 24 jam</li>
      <li>Obat generik dan paten lengkap</li>
      <li>Pelayanan konsultasi obat oleh apoteker</li>
      <li>Sistem komputerisasi untuk pengelolaan stok</li>
      <li>Area tunggu nyaman dan ramah pasien</li>
    </ul>

    <h2>Gambar yang Disarankan</h2>
    <div class="carousel-preview-gallery">
      <button class="carousel-preview-btn prev" onclick="movePreviewCarouselFarmasi(-1)">&#10094;</button>
      <div class="carousel-preview-track" id="carouselPreviewTrackFarmasi">
        <img src="Asset/Farmasi 1.jpg" alt="Farmasi 1" class="carousel-preview-img" />
        <img src="Asset/Farmasi 2.jpg" alt="Farmasi 2" class="carousel-preview-img" />
        <img src="Asset/Farmasi 3.jpg" alt="Farmasi 3" class="carousel-preview-img" />
        <img src="Asset/Farmasi 4.jpg" alt="Farmasi 4" class="carousel-preview-img" />
      </div>
      <button class="carousel-preview-btn next" onclick="movePreviewCarouselFarmasi(1)">&#10095;</button>
    </div>

    <div class="carousel-multi-gallery">
      <button class="carousel-multi-btn prev" onclick="moveMultiCarouselFarmasi(-1)">&#10094;</button>
      <div class="carousel-multi-track" id="carouselMultiTrackFarmasi" data-position="0">
        <div class="carousel-multi-item-farmasi carousel-multi-item"><img src="Asset/Farmasi 1.jpg" alt="Farmasi 1" /></div>
        <div class="carousel-multi-item-farmasi carousel-multi-item"><img src="Asset/Farmasi 2.jpg" alt="Farmasi 2" /></div>
        <div class="carousel-multi-item-farmasi carousel-multi-item"><img src="Asset/Farmasi 3.jpg" alt="Farmasi 3" /></div>
      </div>
      <button class="carousel-multi-btn next" onclick="moveMultiCarouselFarmasi(1)">&#10095;</button>
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
let previewCarouselIndexFarmasi = 0;
const previewImgsFarmasi = [
  "Asset/Farmasi 1.jpg",
  "Asset/Farmasi 2.jpg",
  "Asset/Farmasi 3.jpg",
  "Asset/Farmasi 4.jpg"
];
function showPreviewCarouselFarmasi(idx) {
  const imgs = document.querySelectorAll('#carouselPreviewTrackFarmasi .carousel-preview-img');
  const total = imgs.length;
  if (!imgs.length) return;
  if (idx < 0) previewCarouselIndexFarmasi = total - 1;
  else if (idx >= total) previewCarouselIndexFarmasi = 0;
  else previewCarouselIndexFarmasi = idx;
  imgs.forEach((img, i) => {
    img.style.opacity = "0.5";
    img.style.transform = "scale(0.85)";
    img.style.zIndex = "1";
    img.style.display = "none";
  });
  // Tampilkan 3 gambar: kiri, tengah, kanan
  let left = (previewCarouselIndexFarmasi - 1 + total) % total;
  let center = previewCarouselIndexFarmasi;
  let right = (previewCarouselIndexFarmasi + 1) % total;
  imgs[left].style.display = "inline-block";
  imgs[center].style.display = "inline-block";
  imgs[right].style.display = "inline-block";
  imgs[center].style.opacity = "1";
  imgs[center].style.transform = "scale(1.08)";
  imgs[center].style.zIndex = "2";
}
function movePreviewCarouselFarmasi(dir) {
  showPreviewCarouselFarmasi(previewCarouselIndexFarmasi + dir);
}
document.addEventListener('DOMContentLoaded', function() {
  showPreviewCarouselFarmasi(0);
});
</script>
<script>
let multiCarouselIndexFarmasi = 0;
const multiImgsFarmasi = [
  "Asset/Farmasi 1.jpg",
  "Asset/Farmasi 2.jpg",
  "Asset/Farmasi 3.jpg",
];
function showMultiCarouselFarmasi(idx) {
  const items = document.querySelectorAll('.carousel-multi-item-farmasi');
  const total = items.length;
  if (!items.length) return;
  if (idx < 0) multiCarouselIndexFarmasi = total - 1;
  else if (idx >= total) multiCarouselIndexFarmasi = 0;
  else multiCarouselIndexFarmasi = idx;
  items.forEach((item, i) => {
    item.style.transform = `translateX(${-multiCarouselIndexFarmasi * 100}%)`;
  });
}
function moveMultiCarouselFarmasi(dir) {
  showMultiCarouselFarmasi(multiCarouselIndexFarmasi + dir);
}
document.addEventListener('DOMContentLoaded', function() {
  showMultiCarouselFarmasi(0);
});
</script>
<style>
.carousel-preview-gallery {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0;
  margin: 24px 0 32px 0;
  position: relative;
}
.carousel-preview-track {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 18px;
  min-width: 0;
}
.carousel-preview-img {
  width: 170px;
  height: 120px;
  object-fit: cover;
  border-radius: 12px;
  box-shadow: 0 2px 12px rgba(44,120,220,0.08);
  opacity: 0.5;
  transform: scale(0.85);
  transition: all 0.25s;
  display: none;
  cursor: pointer;
}
.carousel-preview-img[style*="scale(1.08)"] {
  box-shadow: 0 4px 24px #f47b2040;
  border: 3px solid #f47b20;
}
.carousel-preview-btn {
  background: #fff;
  border: 1.5px solid #f47b20;
  color: #f47b20;
  font-size: 2rem;
  border-radius: 50%;
  width: 44px;
  height: 44px;
  cursor: pointer;
  z-index: 2;
  margin: 0 10px;
  transition: background 0.18s, color 0.18s;
  display: flex;
  align-items: center;
  justify-content: center;
}
.carousel-preview-btn:hover {
  background: #f47b20;
  color: #fff;
}
.carousel-multi-gallery {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0;
  margin: 24px 0 32px 0;
  position: relative;
}
.carousel-multi-track {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 18px;
  min-width: 0;
  transition: transform 0.5s ease;
}
.carousel-multi-item-farmasi {
  min-width: 100%;
  display: flex;
  justify-content: center;
}
.carousel-multi-item-farmasi img {
  width: 100%;
  height: auto;
  border-radius: 12px;
  box-shadow: 0 2px 12px rgba(44,120,220,0.08);
}
.carousel-multi-btn {
  background: #fff;
  border: 1.5px solid #f47b20;
  color: #f47b20;
  font-size: 2rem;
  border-radius: 50%;
  width: 44px;
  height: 44px;
  cursor: pointer;
  z-index: 2;
  margin: 0 10px;
  transition: background 0.18s, color 0.18s;
  display: flex;
  align-items: center;
  justify-content: center;
}
.carousel-multi-btn:hover {
  background: #f47b20;
  color: #fff;
}
@media (max-width: 700px) {
  .carousel-preview-img {
    width: 90px;
    height: 60px;
  }
  .carousel-preview-btn {
    width: 36px;
    height: 36px;
    font-size: 1.5rem;
  }
  .carousel-multi-item-farmasi img {
    width: 90%;
  }
  .carousel-multi-btn {
    width: 36px;
    height: 36px;
    font-size: 1.5rem;
  }
}
</style>
</body>
</html>