<?php 
session_start(); 
$judul = 'Teknologi Terkini dalam Bedah Minimal Invasif';
$kategori = 'Bedah';
$penulis = 'dr. Siti Rahmawati, Sp.B';
$tanggal = '2024-08-10';
$badge = 'Bedah';
$konten = 'Bedah minimal invasif menawarkan pemulihan lebih cepat dan risiko komplikasi lebih rendah. Teknologi ini semakin banyak digunakan di berbagai rumah sakit besar.\n\nDengan teknik minimal invasif, sayatan yang dibuat lebih kecil sehingga nyeri pasca operasi berkurang dan waktu rawat inap lebih singkat. Konsultasikan dengan dokter bedah untuk mengetahui apakah tindakan ini sesuai untuk kondisi Anda.';
$kategori_list = ['Anak', 'Kandungan', 'Bedah', 'Gigi', 'Penyakit Dalam'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($judul) ?> - Rumah Sakit Kartini</title>
  <link rel="stylesheet" href="home.css">
  <style>
    .detail-container {
      display: flex;
      gap: 32px;
      align-items: flex-start;
      max-width: 1200px;
      margin: 40px auto 32px auto;
      padding: 0 16px;
    }
    .artikel-detail {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 16px rgba(0,0,0,0.07);
      padding: 48px 48px 32px 48px;
      flex: 2;
      min-width: 0;
    }
    .artikel-detail h1 {
      font-size: 2.2rem;
      margin-bottom: 8px;
    }
    .badge {
      display: inline-block;
      background: #1976d2;
      color: #fff;
      border-radius: 6px;
      padding: 4px 16px;
      font-size: 0.95rem;
      margin-bottom: 16px;
    }
    .author {
      color: #555;
      font-size: 1rem;
      margin-bottom: 12px;
    }
    .date {
      margin-left: 16px;
      color: #888;
      font-size: 0.95rem;
    }
    .artikel-detail .content {
      margin-top: 18px;
      font-size: 1.15rem;
      line-height: 1.7;
      color: #222;
      white-space: pre-line;
    }
    .sidebar {
      flex: 1;
      min-width: 260px;
      max-width: 320px;
      background: #fafbfc;
      border-radius: 14px;
      padding: 32px 20px;
      box-shadow: 0 1px 8px rgba(0,0,0,0.04);
      height: fit-content;
    }
    .categories h3 {
      margin-top: 0;
      font-size: 1.2rem;
      margin-bottom: 12px;
    }
    .categories ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .categories li {
      margin-bottom: 8px;
    }
    .categories a {
      color: #1976d2;
      text-decoration: none;
      font-size: 1rem;
    }
    .categories a[style*="font-weight:bold"] {
      color: #0d47a1;
    }
    @media (max-width: 900px) {
      .detail-container {
        flex-direction: column;
        gap: 0;
      }
      .artikel-detail {
        padding: 24px 10px;
      }
      .sidebar {
        max-width: 100%;
        min-width: 0;
        margin-top: 24px;
      }
    }
  </style>
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
<div class="detail-container">
  <div class="artikel-detail">
    <h1><?= htmlspecialchars($judul) ?></h1>
    <span class="badge"><?= htmlspecialchars($badge) ?></span>
    <div class="author">
      <i class="icon">👤</i> <?= htmlspecialchars($penulis) ?>
      <span class="date">📅 <?= htmlspecialchars($tanggal) ?></span>
    </div>
    <div class="content">
      <?= nl2br(htmlspecialchars($konten)) ?>
    </div>
  </div>
  <aside class="sidebar">
    <div class="categories">
      <h3>Kategori</h3>
      <ul>
        <li><a href="artikel.php">Semua</a></li>
        <?php foreach ($kategori_list as $k): ?>
          <li><a href="artikel.php?kategori=<?= urlencode($k) ?>"<?= $kategori === $k ? ' style="font-weight:bold;"' : '' ?>><?= htmlspecialchars($k) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </aside>
</div>
<!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    <div class="footer-map">
      <div id="googleMap" style="width: 100%; height: 250px;"></div>
    </div>
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
    <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Fitria Andriana Sari, Desna Romana</p>
  </div>
</footer>
<script>
  function initialize() {
    var koordinatTujuan = { lat: -6.238077422724989, lng: 106.7691991230291 };
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
<script src="script.js"></script>
</body>
</html>
