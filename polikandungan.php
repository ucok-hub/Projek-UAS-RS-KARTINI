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

<!--Konten Poli -->
<section>
    <div class="judul-container">
         <h1>POLI KANDUNGAN</h1>
      </div>
  <div class="garis-aktif"></div>

  <div class="container">
  <div class="image">
    <img src="Asset/poli kandungan.jpg" alt="Dokter kandungan sedang memeriksa pasien" />
  </div>

  <div class="content">
    <!-- Hanya deskripsi dan ruang lingkup di sini -->
    <p class="description">
      Rumah Sakit Kartini Jakarta memiliki poliklinik kandungan (obgyn) yang menangani masalah kehamilan,
      persalinan, serta kesehatan reproduksi wanita secara menyeluruh...
    </p>

    <h2>Ruang Lingkup Pelayanan</h2>
    <ol>
      <li>Pemeriksaan kehamilan rutin (antenatal care)</li>
      <li>Penanganan gangguan menstruasi dan hormonal</li>
      <li>Deteksi dini dan pengobatan penyakit kandungan (kista, mioma, endometriosis)</li>
      <li>Pemeriksaan dan edukasi prakonsepsi</li>
      <li>Perawatan kehamilan risiko tinggi</li>
      <li>Persalinan normal maupun tindakan operasi caesar</li>
      <li>Kesehatan reproduksi remaja hingga menopause</li>
    </ol>
  </div>
</div>

<!-- Dropdown Area -->
<div class="dropdown-section">
  <details>
    <summary><h2>Layanan Unggulan</h2></summary>
    <ol>
      <li>USG 2D/3D/4D: Pemeriksaan janin dengan visualisasi yang lebih detail</li>
      <li>Program Kehamilan (Promil): Konsultasi dan pendampingan intensif</li>
      <li>Klinik Menopause: Penanganan komprehensif</li>
      <li>Pap Smear & IVA Test: Deteksi dini kanker serviks</li>
      <li>Layanan Edukasi Ibu Hamil</li>
    </ol>
  </details>

  <details>
    <summary><h2>Fasilitas dan Teknologi</h2></summary>
    <ol>
      <li>Ruang pemeriksaan yang nyaman dan privat</li>
      <li>Alat USG digital</li>
      <li>CTG (Cardiotocography)</li>
      <li>Ruang bersalin modern</li>
      <li>Laboratorium pendukung</li>
      <li>Sistem rekam medis elektronik</li>
    </ol>
  </details>

  <details>
    <summary><h2>Dokter Spesialis Kandungan</h2></summary>
    <ol>
      <li>dr. Amelia Wahyuni, Sp.OG</li>
      <li></li>
    </ol>
  </details>
</div>

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
        <p>
          All Rights Reserved ©2025 Kelompok 4 AnnisaEkaDanti FitriaAndrianaSari
          DesnaRomarta
        </p>
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