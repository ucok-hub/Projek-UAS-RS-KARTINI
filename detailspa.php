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
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Baby Spa</h1>
  </div>
  <img src="Asset/baby spa 1.jpg" alt="Header Baby Spa" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

<section>

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
    <div class="carousel-multi-gallery">
      <button class="carousel-multi-btn prev" onclick="moveMultiCarousel(-1)">&#10094;</button>
      <div class="carousel-multi-track" id="carouselMultiTrack">
        <div class="carousel-multi-item">
          <img src="Asset/baby spa 1.jpg" alt="Baby Spa 1" />
        </div>
        <div class="carousel-multi-item">
          <img src="Asset/baby spa 2.jpg" alt="Baby Spa 2" />
        </div>
        <div class="carousel-multi-item">
          <img src="Asset/baby spa 3.jpg" alt="Baby Spa 3" />
        </div>
        <div class="carousel-multi-item">
          <img src="Asset/baby spa 4.jpg" alt="Baby Spa 4" />
        </div>
      </div>
      <button class="carousel-multi-btn next" onclick="moveMultiCarousel(1)">&#10095;</button>
    </div>
    <!-- Modal for full image -->
    <div id="spaModal" class="spa-modal" onclick="closeSpaModal()">
      <span class="spa-modal-close" onclick="closeSpaModal(event)">&times;</span>
      <img id="spaModalImg" src="" alt="Full Spa" />
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
let carouselIndex = 0;
const showCarousel = (idx) => {
  const imgs = document.querySelectorAll('.carousel-img');
  if (!imgs.length) return;
  imgs.forEach(img => img.style.display = 'none');
  if (idx < 0) carouselIndex = imgs.length - 1;
  else if (idx >= imgs.length) carouselIndex = 0;
  else carouselIndex = idx;
  imgs[carouselIndex].style.display = 'block';
};
function moveCarousel(dir) {
  showCarousel(carouselIndex + dir);
}
document.addEventListener('DOMContentLoaded', function() {
  showCarousel(0);
});
</script>
<script>
function showFullSpaImg(src) {
  var modal = document.getElementById("spaModal");
  var img = document.getElementById("spaModalImg");
  img.src = src;
  modal.style.display = "flex";
}
function closeSpaModal(e) {
  if (!e || e.target.classList.contains("spa-modal") || e.target.classList.contains("spa-modal-close")) {
    document.getElementById("spaModal").style.display = "none";
  }
}
</script>
<script>
let multiCarouselIndex = 0;
const visibleCount = 3;
function showMultiCarousel(idx) {
  const items = document.querySelectorAll('.carousel-multi-item');
  const total = items.length;
  if (!items.length) return;
  // Loop index
  if (idx < 0) multiCarouselIndex = total - visibleCount;
  else if (idx > total - visibleCount) multiCarouselIndex = 0;
  else multiCarouselIndex = idx;
  // Hide all
  items.forEach(item => item.style.display = 'none');
  // Show visibleCount items
  for (let i = 0; i < visibleCount; i++) {
    let showIdx = multiCarouselIndex + i;
    if (showIdx >= total) showIdx -= total;
    items[showIdx].style.display = 'block';
  }
}
function moveMultiCarousel(dir) {
  showMultiCarousel(multiCarouselIndex + dir);
}
document.addEventListener('DOMContentLoaded', function() {
  showMultiCarousel(0);
});
</script>
<style>
.carousel-multi-gallery {
  position: relative;
  max-width: 900px;
  margin: 0 auto 32px auto;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0;
}
.carousel-multi-track {
  display: flex;
  gap: 24px;
  width: 100%;
  justify-content: center;
  align-items: center;
}
.carousel-multi-item {
  flex: 0 0 260px;
  max-width: 260px;
  display: none;
  transition: opacity 0.3s;
}
.carousel-multi-item img {
  width: 100%;
  height: 170px;
  object-fit: cover;
  border-radius: 14px;
  box-shadow: 0 2px 12px rgba(44,120,220,0.08);
  background: #f2f2f2;
  display: block;
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
.spa-card-gallery {
  display: flex;
  gap: 28px;
  justify-content: center;
  align-items: stretch;
  margin: 24px 0 32px 0;
  flex-wrap: wrap;
}
.spa-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 18px rgba(44,120,220,0.09);
  width: 300px;
  min-width: 220px;
  max-width: 340px;
  display: flex;
  flex-direction: column;
  align-items: center;
  overflow: hidden;
  margin-bottom: 0;
  text-align: center;
  padding-bottom: 18px;
  transition: box-shadow 0.2s;
}
.spa-card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
  background: #f2f2f2;
  display: block;
}
.spa-card-caption {
  font-size: 1.08rem;
  font-weight: 600;
  color: #1976d2;
  margin: 16px 0 8px 0;
  padding: 0 12px;
  line-height: 1.3;
}
.spa-card-btn {
  background: #f47b20;
  color: #fff;
  border: none;
  border-radius: 24px;
  padding: 10px 28px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  margin-bottom: 10px;
  margin-top: 8px;
  transition: background 0.18s;
  box-shadow: 0 2px 8px rgba(44,120,220,0.07);
}
.spa-card-btn:hover, .spa-card-btn:focus {
  background: #009688;
  color: #fff;
}
.spa-modal {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0; top: 0; right: 0; bottom: 0;
  width: 100vw; height: 100vh;
  background: rgba(0,0,0,0.8);
  align-items: center;
  justify-content: center;
  cursor: zoom-out;
}
.spa-modal img {
  max-width: 90vw;
  max-height: 90vh;
  border-radius: 12px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.25);
  background: #fff;
  display: block;
}
.spa-modal-close {
  position: absolute;
  top: 32px;
  right: 48px;
  color: #fff;
  font-size: 3rem;
  font-weight: bold;
  cursor: pointer;
  z-index: 10001;
  user-select: none;
}
@media (max-width: 900px) {
  .spa-card-gallery {
    flex-direction: column;
    align-items: center;
    gap: 18px;
  }
  .spa-card {
    width: 98vw;
    max-width: 98vw;
  }
}
@media (max-width: 600px) {
  .carousel-img {
    width: 98vw;
    height: 160px;
  }
  .carousel-gallery {
    max-width: 98vw;
  }
  .spa-card img {
    height: 140px;
  }
  .spa-modal-close {
    top: 12px;
    right: 18px;
    font-size: 2rem;
  }
}
</style>
</body>
</html>