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

<!-- Deskripsi Rumah Sakit  -->
<section class="tentang-rs">
    <div class="konten-kiri">
        <div class="judul-container">
            <h1>RUMAH SAKIT KARTINI</h1>
          </div>
  
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
  
      <p><strong>Visi:</strong></p>
      <p>"Menjadi Rumah Sakit pilihan masyarakat yang peduli pada kesehatan keluarga secara menyeluruh."</p>
  
      <p><strong>Misi:</strong></p>
      <p>1. Menyelenggarakan manajemen peningkatan mutu keselamatan pasien melalui akreditasi dan sertifikasi</p>
      <p>2. Meningkatkan kompetensi sumber daya manusia rumah sakit</p>
      <p>3. Melengkapi sarana dan prasarana rumah sakit secara bertahap</p>
      <p>4. Meningkatkan mutu pelayanan rujukan dan asuransi swasta maupun BPJS</p>
  
    </div>
  
    <div class="konten-kanan">
      <img src="gambar-rumah-sakit.jpg" href="profil.html" alt="Rumah Sakit Kartini">
    </div>
  </section>
  <!-- Tentang Rumah Sakit End -->

<!-- Sejarah Rumah Sakit -->
<section class="sejarah">
    <div class="konten-kiri">
      <div class="judul-container">
        <h2>SEJARAH RUMAH SAKIT KARTINI</h2>
      </div>
  
      <div class="item">
        <img src="icon1.png" alt="Digital" class="icon">
        <div>
          <h3>1967</h3>
          <p>Rumah Sakit Kartini, yang awalnya didirikan oleh Bidan Kartini sebagai praktek mandiri</p>
        </div>
      </div>
  
      <div class="item">
        <img src="icon2.png" alt="Perawatan" class="icon">
        <div>
          <h3>1980</h3>
          <p>Memulai praktek di Jakarta Selatan.</p>
        </div>
      </div>
  
      <div class="item">
        <img src="icon3.png" alt="Bukti" class="icon">
        <div>
          <h3>1990</h3>
          <p>Rumah sakit ini berkembang menjadi Rumah Sakit Bersalin Kartini dan mulai menawarkan pelayanan medis lebih luas.</p>
        </div>
      </div>
  
      <div class="item">
        <img src="icon4.png" alt="Kolaborasi" class="icon">
        <div>
          <h3>2003</h3>
          <p>Fasilitas ruang operasi diperkenalkan, diikuti dengan peresmian Rumah Sakit Kartini pada tahun 2004.</p>
        </div>
      </div>
  
      <div class="item">
        <img src="icon5.png" alt="Pengembangan" class="icon">
        <div>
          <h3>2008</h3>
          <p>Fasilitas layanan rumah sakit semakin ditingkatkan.</p>
        </div>
      </div>
  
      <div class="item">
        <img src="icon6.png" alt="Pendidikan" class="icon">
        <div>
          <h3>2009</h3>
          <p>Bidan Kartini mendirikan Akademi Kebidanan Kartini.</p>
        </div>
      </div>
  
      <div class="item">
        <img src="icon7.png" alt="Anak-anak" class="icon">
        <div>
          <h3>2014</h3>
          <p>Rumah Sakit Kartini mulai mengembangkan pelayanan bagi anak-anak.</p>
        </div>
      </div>
  
      <div class="item">
        <img src="icon8.png" alt="Perluasan" class="icon">
        <div>
          <h3>2015</h3>
          <p>Rumah Sakit Kartini semakin berkembang dengan menambah Rumah Sakit Umum Kartini.</p>
        </div>
      </div>
  
      <div class="item">
        <img src="icon9.png" alt="Modernisasi" class="icon">
        <div>
          <h3>2017</h3>
          <p>Rumah sakit ini kemudian mengalami perubahan signifikan dan semakin fokus pada pelayanan kesehatan umum, menjadikannya sebagai rumah sakit umum yang memberikan pelayanan kesehatan yang lebih luas.</p>
        </div>
      </div>
  
    </div>
  </section>
  <!-- Sejarah Rumah Sakit End -->
  

  <!--Footer-->
<footer class="footer">
    <div class="footer-container">
      <div class="footer-map">
        <!-- Ganti src dengan embed Google Maps nantinya -->
        <div class="map-placeholder"></div>
      </div>
      <div class="footer-info">
        <p>
          Jalan Ciledug Raya No. 94-96, Cipulir, Kebayoran Lama, RT.13/RW.6,<br>
          Cipulir, Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12230
        </p>
        <div class="footer-social">
          <a href="https://www.facebook.com/kartini.hospital.79/"><img src="facebook-icon.png" alt="Facebook" /></a>
          <a href="https://www.instagram.com/kartini.hospital?igsh=dDBsaGFnYm8xZ255 "><img src="instagram-icon.png" alt="Instagram" /></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>All Rights Reserved ©2025 Kelompok AnnisaEkaDanti FitriaAndrianaSari DesnaRomana</p>
    </div>
  </footer>
  
<!--Footer End-->

<!--Script Js-->
  <script src="script.js"></script>
</body>
</html>