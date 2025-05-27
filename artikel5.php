<?php 
session_start(); 
$judul = 'Teknologi Terkini dalam Bedah Minimal Invasif';
$kategori = 'Bedah';
$penulis = 'dr. Siti Rahmawati, Sp.B';
$tanggal = '2024-08-10';
$badge = 'Bedah';
$konten = 'Bedah minimal invasif menawarkan pemulihan lebih cepat dan risiko komplikasi lebih rendah. Teknologi ini semakin banyak digunakan di berbagai rumah sakit besar.\n\nDengan teknik minimal invasif, sayatan yang dibuat lebih kecil sehingga nyeri pasca operasi berkurang dan waktu rawat inap lebih singkat. Konsultasikan dengan dokter bedah untuk mengetahui apakah tindakan ini sesuai untuk kondisi Anda.';
$tags = ['Bedah', 'Teknologi', 'Minimal Invasif', 'Kesehatan', 'Operasi'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($judul) ?> - Rumah Sakit Kartini</title>
  <link rel="stylesheet" href="home.css">
  <style>
    body { background: #fafbfc; }
    .main-article-container {
      display: flex;
      gap: 40px;
      max-width: 1200px;
      margin: 40px auto 32px auto;
      padding: 0 16px;
      align-items: flex-start;
    }
    .article-content {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 16px rgba(0,0,0,0.07);
      flex: 2;
      min-width: 0;
      padding: 0 0 32px 0;
    }
    .article-image-wrapper {
      position: relative;
      border-radius: 18px 18px 0 0;
      overflow: hidden;
      width: 100%;
      height: 340px;
      background: #e3eaf6;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .article-image-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .badge-artikel {
      position: absolute;
      top: 24px;
      left: 24px;
      background: #1abc9c;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 7px 18px;
      font-size: 1rem;
      letter-spacing: 1px;
      z-index: 2;
    }
    .article-body {
      padding: 32px 40px 0 40px;
    }
    .article-body .author {
      color: #1976d2;
      font-size: 1rem;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .article-body .date {
      color: #888;
      font-size: 0.98rem;
    }
    .article-body h1 {
      font-size: 2.1rem;
      font-weight: 700;
      margin: 10px 0 18px 0;
      color: #22314a;
    }
    .article-body .summary {
      font-size: 1.13rem;
      color: #444;
      margin-bottom: 24px;
      line-height: 1.7;
    }
    .btn-readmore {
      display: inline-block;
      background: #f47b20;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 12px 32px;
      font-size: 1.1rem;
      text-decoration: none;
      margin-top: 8px;
      transition: background 0.2s;
    }
    .btn-readmore:hover {
      background: #00796b;
    }
    .sidebar-artikel {
      flex: 1;
      min-width: 260px;
      max-width: 340px;
      display: flex;
      flex-direction: column;
      gap: 32px;
    }
    .sidebar-box {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 1px 8px rgba(0,0,0,0.04);
      padding: 28px 22px 22px 22px;
    }
    .sidebar-box h3 {
      margin-top: 0;
      font-size: 1.2rem;
      margin-bottom: 14px;
      color: #22314a;
      font-weight: 700;
    }
    .sidebar-search {
      display: flex;
      align-items: center;
      gap: 8px;
      background: #f5f7fa;
      border-radius: 8px;
      padding: 8px 12px;
      margin-bottom: 0;
    }
    .sidebar-search input[type="text"] {
      border: none;
      background: transparent;
      outline: none;
      font-size: 1rem;
      flex: 1;
      padding: 6px 0;
    }
    .sidebar-search button {
      background: none;
      border: none;
      color: #009688;
      font-size: 1.2rem;
      cursor: pointer;
    }
    .sidebar-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .sidebar-tags .tag {
      background: #f5f7fa;
      color: #22314a;
      border-radius: 6px;
      padding: 7px 18px;
      font-size: 0.98rem;
      border: 1px solid #e0e0e0;
      transition: background 0.2s;
    }
    .sidebar-tags .tag:hover {
      background: #e0f2f1;
    }
    @media (max-width: 900px) {
      .main-article-container {
        flex-direction: column;
        gap: 0;
      }
      .article-content {
        padding: 0 0 24px 0;
      }
      .article-body {
        padding: 24px 10px 0 10px;
      }
      .sidebar-artikel {
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
<div class="main-article-container">
  <div class="article-content">
    <div class="article-image-wrapper">
      <img src="Asset/Artikel Bedah.jpg" alt="Teknologi Terkini dalam Bedah Minimal Invasif" />
      <span class="badge-artikel"><?= htmlspecialchars($badge) ?></span>
    </div>
    <div class="article-body">
      <div class="author">
        <span>by <?= htmlspecialchars($penulis) ?></span>
        <span class="date">📅 <?= htmlspecialchars($tanggal) ?></span>
      </div>
      <h1><?= htmlspecialchars($judul) ?></h1>
      <div class="summary">
        <p>Bedah minimal invasif menawarkan pemulihan lebih cepat dan risiko komplikasi lebih rendah. Teknologi ini semakin banyak digunakan di berbagai rumah sakit besar untuk berbagai jenis operasi.</p>
        <p>Dengan teknik minimal invasif, sayatan yang dibuat lebih kecil sehingga nyeri pasca operasi berkurang dan waktu rawat inap lebih singkat. Hal ini sangat menguntungkan pasien karena proses pemulihan menjadi lebih nyaman dan cepat.</p>
        <p>Perkembangan teknologi bedah seperti penggunaan kamera kecil (laparoskopi) dan alat-alat canggih lainnya memungkinkan dokter melakukan operasi dengan presisi tinggi. Risiko infeksi dan perdarahan juga dapat ditekan seminimal mungkin.</p>
        <p>Pasien yang menjalani bedah minimal invasif biasanya dapat kembali beraktivitas normal dalam waktu yang lebih singkat dibandingkan dengan operasi konvensional. Namun, tidak semua kasus dapat ditangani dengan teknik ini, sehingga konsultasi dengan dokter bedah sangat penting.</p>
        <p>Jika Anda atau keluarga memerlukan tindakan bedah, diskusikan dengan dokter mengenai pilihan minimal invasif. Pilihan ini dapat memberikan banyak manfaat dan meningkatkan kualitas hidup pasien pasca operasi.</p>
      </div>
    </div>
  </div>
  <aside class="sidebar-artikel">
    <div class="sidebar-box">
      <form class="sidebar-search" action="#" method="get">
        <input type="text" placeholder="Search Here" />
        <button type="submit"><span style="font-size:1.2rem;">&#128269;</span></button>
      </form>
    </div>
    <div class="sidebar-box">
      <h3>Tags</h3>
      <div class="sidebar-tags">
        <?php foreach ($tags as $tag): ?>
          <span class="tag"><?= htmlspecialchars($tag) ?></span>
        <?php endforeach; ?>
      </div>
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
    <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Desna Romarta Tambun, Fitria Andriana Sari</p>
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
