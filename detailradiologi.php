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
     <div style="font-size:1.1rem; margin-bottom:10px; opacity:0.85;">Fasilitas</div>
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Radiologi</h1>
  </div>
  <img src="Asset/Radiologi 1.jpg" alt="Header Radiologi" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

<section>
  <div class="judul-detail-content">
    <h2>Deskripsi</h2>
    <p>
      Layanan Radiologi di RSU Kartini Jakarta menyediakan pemeriksaan pencitraan medis lengkap dan akurat untuk mendukung proses diagnosis dan perencanaan pengobatan pasien. Dengan tim radiografer profesional dan teknologi mutakhir, kami mampu mendeteksi berbagai kondisi medis sejak dini secara non-invasif dan minim risiko.
       Radiologi memainkan peran penting dalam berbagai bidang, termasuk penyakit dalam, bedah, ortopedi, neurologi, onkologi, dan kandungan. Layanan ini terbuka bagi pasien rawat jalan, rawat inap, dan pemeriksaan rujukan dari fasilitas kesehatan lain.
    </p>

    <h2>Fasilitas dan Teknologi</h2>
    <ul>
      <li><h4>CT-Scan Multislice</h4>Untuk pencitraan 3D organ tubuh seperti otak, paru-paru, tulang, dan pembuluh darah. Cocok untuk deteksi stroke, tumor, trauma, dan kelainan tulang.</li>
      <li><h4>MRI (Magnetic Resonance Imaging)</h4>Pemeriksaan tanpa radiasi yang menghasilkan gambar detail jaringan lunak, seperti otak, sumsum tulang belakang, persendian, dan organ dalam.</li>
      <li><h4>X-Ray Digital (Rontgen)</h4>Pemeriksaan cepat dan efisien untuk diagnosa tulang retak, infeksi paru, gangguan jantung, dan penyakit lainnya.</li>
      <li><h4>Ultrasonografi (USG)</h4>Pemeriksaan berbasis gelombang suara untuk melihat organ dalam, kehamilan, atau kondisi abdomen dan pelvis.</li>
      <li><h4>PACS (Picture Archiving and Communication System)</h4>Sistem digital untuk penyimpanan dan pengiriman gambar radiologi ke dokter dengan cepat, sehingga mempercepat proses diagnosis dan tindakan medis.</li>
      <li><h4>Tim Radiologi Profesional</h4>Dijalankan oleh radiolog berpengalaman dan radiografer bersertifikat untuk memastikan akurasi pemeriksaan dan kenyamanan pasien.
</li>
    </ul>

    <h2>Gambar yang Disarankan</h2>
    <div class="carousel-multi-gallery">
      <button class="carousel-multi-btn prev" onclick="moveMultiCarouselRadiologi(-1)">&#10094;</button>
      <div class="carousel-multi-track" id="carouselMultiTrackRadiologi" data-position="0">
        <div class="carousel-multi-item-radiologi carousel-multi-item"><img src="Asset/Radiologi 1.jpg" alt="Radiologi 1" /></div>
        <div class="carousel-multi-item-radiologi carousel-multi-item"><img src="Asset/Radiologi 2.jpg" alt="Radiologi 2" /></div>
        <div class="carousel-multi-item-radiologi carousel-multi-item"><img src="Asset/Radiologi 3.jpg" alt="Radiologi 3" /></div>
      </div>
      <button class="carousel-multi-btn next" onclick="moveMultiCarouselRadiologi(1)">&#10095;</button>
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
let multiCarouselIndexRad = 0;
const visibleCountRad = 3;
function showMultiCarouselRad(idx) {
  const items = document.querySelectorAll('.carousel-multi-item-rad');
  const total = items.length;
  if (!items.length) return;
  if (idx < 0) multiCarouselIndexRad = total - visibleCountRad;
  else if (idx > total - visibleCountRad) multiCarouselIndexRad = 0;
  else multiCarouselIndexRad = idx;
  items.forEach(item => item.style.display = 'none');
  for (let i = 0; i < visibleCountRad; i++) {
    let showIdx = multiCarouselIndexRad + i;
    if (showIdx >= total) showIdx -= total;
    items[showIdx].style.display = 'block';
  }
}
function moveMultiCarouselRad(dir) {
  showMultiCarouselRad(multiCarouselIndexRad + dir);
}
document.addEventListener('DOMContentLoaded', function() {
  showMultiCarouselRad(0);
});
</script>
<style>
.carousel-multi-gallery {
  position: relative;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
  overflow: hidden;
  border-radius: 14px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}
.carousel-multi-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255, 255, 255, 0.8);
  border: none;
  padding: 10px;
  cursor: pointer;
  font-size: 18px;
  border-radius: 50%;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
  z-index: 10;
}
.carousel-multi-btn.prev {
  left: 10px;
}
.carousel-multi-btn.next {
  right: 10px;
}
.carousel-multi-track {
  display: flex;
  transition: transform 0.3s ease;
}
.carousel-multi-item-rad {
  flex: 0 0 260px;
  max-width: 260px;
  display: none;
  transition: opacity 0.3s;
}
.carousel-multi-item-rad img {
  width: 100%;
  height: 170px;
  object-fit: cover;
  border-radius: 14px;
  box-shadow: 0 2px 12px rgba(44,120,220,0.08);
  background: #f2f2f2;
  display: block;
}
@media (max-width: 900px) {
  .carousel-multi-item-rad {
    flex: 0 0 90vw;
    max-width: 90vw;
  }
}
@media (max-width: 600px) {
  .carousel-multi-item-rad img {
    height: 110px;
  }
}
</style>
</body>
</html>