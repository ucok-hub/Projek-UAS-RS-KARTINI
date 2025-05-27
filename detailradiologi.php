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
      <h1>Radiologi</h1>
    </div>
  </div>

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
    <div class="image-gallery">
      <img src="Asset/Ruang Radiologi.jpg" alt="Gambar Radiologi 1" />
      <img src="Asset/Radiologi2.jpg" alt="Gambar Radiologi 2" />
      <img src="Asset/Radiologi3.jpg" alt="Gambar Radiologi 3" />
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