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

<!-- Judul Section -->
<div style="width:100%; background:##f47b20; min-height:220px; display:flex; align-items:center; justify-content:center; position:relative; margin-bottom:36px; border-radius:28px; overflow:hidden;">
  <div style="position:absolute; left:0; top:0; width:100%; height:100%; background:rgba(22, 120, 109, 0.78); z-index:1;"></div>
  <div style="position:relative; z-index:2; text-align:center; width:100%; color:#fff;">
     <div style="font-size:1.1rem; margin-bottom:10px; opacity:0.85;">Poli</div>
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Klinik Kandungan</h1>
  </div>
  <img src="Asset/poli kandungan.jpg" alt="Header Artikel" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

<section>
  <div class="container">
    <div class="image">
      <img src="Asset/poli kandungan.jpg" alt="Dokter kandungan sedang memeriksa pasien" />
    </div>
    <div class="content">
      <p class="description">
        Rumah Sakit Kartini Jakarta memiliki poliklinik kandungan (obgyn) yang menangani masalah kehamilan,
        persalinan, serta kesehatan reproduksi wanita secara menyeluruh...
      </p>
      <div class="dropdown-section">
        <details>
          <summary><h2>Ruang Lingkup Pelayanan</h2></summary>
          <ol>
            <li>Pemeriksaan kehamilan rutin (antenatal care)</li>
            <li>Penanganan gangguan menstruasi dan hormonal</li>
            <li>Deteksi dini dan pengobatan penyakit kandungan (kista, mioma, endometriosis)</li>
            <li>Pemeriksaan dan edukasi prakonsepsi</li>
            <li>Perawatan kehamilan risiko tinggi</li>
            <li>Persalinan normal maupun tindakan operasi caesar</li>
            <li>Kesehatan reproduksi remaja hingga menopause</li>
          </ol>
        </details>
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
            <li>dr. Natasya Prameswari, Sp.OG</li>
            <li>dr. Tri Yuniarti, Sp.OG</li>
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