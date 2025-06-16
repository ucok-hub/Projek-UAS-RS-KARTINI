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
     <div style="font-size:1.1rem; margin-bottom:10px; opacity:0.85;">Selamat Datang di</div>
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Rumah Sakit Kartini</h1>
  </div>
  <img src="Asset/Artikel Anak.jpg" alt="Header Artikel" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

<!-- Deskripsi Rumah Sakit  -->
<section class="tentang-rs">
    <div class="konten-kiri">
        <div class="judul-container">
            <h1>TENTANG KAMI</h1>
          </div>
      <div class="garis-aktif"></div>
  
      <p><strong>Deskripsi:</strong></p>
      <p>Rumah Sakit Kartini Ciledug adalah rumah sakit bersalin yang berlokasi di Jalan Ciledug Raya No. 94-96, Cipulir, Kebayoran Lama. Didirikan pada tahun 1980, rumah sakit ini menawarkan berbagai layanan kesehatan, termasuk rawat inap, rawat jalan, dan gawat darurat. Rumah sakit ini juga memiliki fasilitas penunjang seperti kantin, ATM, dan lahan parkir yang luas.
      </p>
  
      <p><strong>Jargon RS</strong></p>
      <p>Keluarga yang sehat adalah keluarga yang siap menyongsong hari depan.</p>
      
      <p><strong>Pemilik RS</strong></p>
      <p>Bidan Kartini, SSiT, MKES</p>
      <p>Aktif berpraktek sebagai bidan dan tenaga pengajar ilmu kebidanan, Bidan Kartini kemudian mendirikan Kartini Hospital dan Akademi Kebidanan Kartini</p>
    </div>
  
  </section>
<!-- Deskripsi Rumah Sakit End -->

<!-- Tentang Rumah Sakit -->
<section class="tentang-rs">
    <div class="konten-kiri">
    <div class="judul-container">
        <h2>TENTANG RUMAH SAKIT KARTINI</h2>
    </div>
    <div class="garis-aktif"></div>
  
      <p><strong>Visi:</strong></p>
      <p>"Menjadi Rumah Sakit pilihan masyarakat yang peduli pada kesehatan keluarga secara menyeluruh."</p>
  
      <p><strong>Misi:</strong></p>
      <p>1. Menyelenggarakan manajemen peningkatan mutu keselamatan pasien melalui akreditasi dan sertifikasi</p>
      <p>2. Meningkatkan kompetensi sumber daya manusia rumah sakit</p>
      <p>3. Melengkapi sarana dan prasarana rumah sakit secara bertahap</p>
      <p>4. Meningkatkan mutu pelayanan rujukan dan asuransi swasta maupun BPJS</p>
  
    </div>
  
    <div class="konten-kanan">
      <img src="Asset/Bidan Kartini, SSiT, MKES.png" href="profil.html" alt="Rumah Sakit Kartini">
    </div>
  </section>
  <!-- Tentang Rumah Sakit End -->

<!-- Sejarah Rumah Sakit -->
<section class="sejarah">
    <div class="konten-kiri">
      <div class="judul-container">
        <h2>SEJARAH RUMAH SAKIT KARTINI</h2>
      </div>
      <div class="garis-aktif"></div>
  
      <!-- Mulai ubah struktur item menjadi dua kolom -->
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">1967</h3>
        </div>
        <div>
          <p>Rumah Sakit Kartini, yang awalnya didirikan oleh Bidan Kartini sebagai praktek mandiri</p>
        </div>
      </div>
  
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">1980</h3>
        </div>
        <div>
          <p>Memulai praktek di Jakarta Selatan.</p>
        </div>
      </div>
  
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">1990</h3>
        </div>
        <div>
          <p>Rumah sakit ini berkembang menjadi Rumah Sakit Bersalin Kartini dan mulai menawarkan pelayanan medis lebih luas.</p>
        </div>
      </div>
  
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">2003</h3>
        </div>
        <div>
          <p>Fasilitas ruang operasi diperkenalkan, diikuti dengan peresmian Rumah Sakit Kartini pada tahun 2004.</p>
        </div>
      </div>
  
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">2008</h3>
        </div>
        <div>
          <p>Fasilitas layanan rumah sakit semakin ditingkatkan.</p>
        </div>
      </div>
  
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">2009</h3>
        </div>
        <div>
          <p>Bidan Kartini mendirikan Akademi Kebidanan Kartini.</p>
        </div>
      </div>
  
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">2014</h3>
        </div>
        <div>
          <p>Rumah Sakit Kartini mulai mengembangkan pelayanan bagi anak-anak.</p>
        </div>
      </div>
  
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">2015</h3>
        </div>
        <div>
          <p>Rumah Sakit Kartini semakin berkembang dengan menambah Rumah Sakit Umum Kartini.</p>
        </div>
      </div>
  
      <div class="item" style="display: flex; align-items: flex-start; gap: 16px;">
        <div style="min-width:70px; text-align:center;">
          <h3 style="margin:0;">2017</h3>
        </div>
        <div>
          <p>Rumah sakit ini kemudian mengalami perubahan signifikan dan semakin fokus pada pelayanan kesehatan umum, menjadikannya sebagai rumah sakit umum yang memberikan pelayanan kesehatan yang lebih luas.</p>
        </div>
      </div>
      <!-- Akhir ubah struktur item -->
    </div>
  </section>
  <!-- Sejarah Rumah Sakit End -->
  

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
    <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Desna Romarta Tambun, Fitria Andriana Sari</p>
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