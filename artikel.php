<?php 
session_start(); 

// Data artikel (bisa diganti dengan database di masa depan)
$artikel = [
  [
    'judul' => 'Pentingnya Imunisasi Dasar Lengkap bagi Anak',
    'kategori' => 'Anak',
    'penulis' => 'dr. Yuni Astari, Sp.A',
    'tanggal' => '2025-05-19',
    'konten' => 'Imunisasi merupakan langkah pencegahan utama terhadap penyakit infeksi yang berbahaya pada anak. Imunisasi dasar lengkap harus diberikan sesuai jadwal sejak bayi baru lahir agar tubuh anak membentuk kekebalan optimal terhadap berbagai penyakit seperti hepatitis B, polio, campak, difteri, pertusis, dan tetanus.',
    'img' => 'Asset/Artikel Anak.jpg',
    'tags' => ['Imunisasi', 'Anak', 'Kesehatan', 'Vaksin', 'Pencegahan'],
    'badge' => 'Kesehatan Anak',
    'penulis' => 'dr. Yuni Astari, Sp.A',
    'tanggal' => '2025-05-19',
  ],
  [
    'judul' => 'Menjaga Kesehatan Gigi Sejak Dini untuk Mencegah Karies',
    'kategori' => 'Gigi',
    'penulis' => 'drg. M. Rifky Syarif, Sp.KGA',
    'tanggal' => '2025-03-19',
    'konten' => 'Kesehatan gigi dan mulut adalah bagian penting dari kesehatan umum. Sayangnya, karies gigi (gigi berlubang) masih menjadi masalah utama di Indonesia, terutama pada anak-anak usia sekolah. Karies sering kali tidak menimbulkan gejala awal, namun jika dibiarkan, dapat menyebabkan nyeri, infeksi, hingga kehilangan gigi.',
    'img' => 'Asset/Artikel Gigi.jpg',
    'tags' => ['Gigi', 'Karies', 'Pencegahan', 'Kesehatan', 'Anak'],
    'badge' => 'Kesehatan Gigi',
    'penulis' => 'drg. M. Rifky Syarif, Sp.KGA',
    'tanggal' => '2025-03-19',
  ],
  [
    'judul' => 'Tips Kehamilan Sehat: Panduan untuk Ibu dan Janin',
    'kategori' => 'Kandungan',
    'penulis' => 'dr. Hilda R. Kusuma, Sp.OG',
    'tanggal' => '2024-06-19',
    'konten' => 'Kehamilan adalah masa yang istimewa sekaligus menantang bagi seorang wanita. Perubahan hormon, fisik, hingga emosi terjadi dalam waktu singkat. Oleh karena itu, menjaga kehamilan tetap sehat sangat penting untuk kesejahteraan ibu dan tumbuh kembang janin.',
    'img' => 'Asset/Artikel Kandungan.jpg',
    'tags' => ['Kehamilan', 'Tips', 'Ibu', 'Janin', 'Kesehatan'],
    'badge' => 'Tips Kehamilan',
    'penulis' => 'dr. Hilda R. Kusuma, Sp.OG',
    'tanggal' => '2024-06-19',
  ],
  [
    'judul' => 'Pentingnya Pemeriksaan Rutin untuk Penyakit Dalam',
    'kategori' => 'Penyakit Dalam',
    'penulis' => 'dr. Andi Pratama, Sp.PD',
    'tanggal' => '2024-07-01',
    'konten' => 'Pemeriksaan rutin sangat penting untuk mendeteksi dini penyakit dalam seperti diabetes, hipertensi, dan gangguan ginjal. Dengan deteksi dini, pengobatan dapat dilakukan lebih efektif.',
    'img' => 'Asset/Artikel Dalam.jpg',
    'tags' => ['Penyakit Dalam', 'Pemeriksaan', 'Deteksi Dini', 'Kesehatan'],
    'badge' => 'Penyakit Dalam',
    'penulis' => 'dr. Andi Pratama, Sp.PD',
    'tanggal' => '2024-07-01',
  ],
  [
    'judul' => 'Teknologi Terkini dalam Bedah Minimal Invasif',
    'kategori' => 'Bedah',
    'penulis' => 'dr. Siti Rahmawati, Sp.B',
    'tanggal' => '2024-08-10',
    'konten' => 'Bedah minimal invasif menawarkan pemulihan lebih cepat dan risiko komplikasi lebih rendah. Teknologi ini semakin banyak digunakan di berbagai rumah sakit besar.',
    'img' => 'Asset/Artikel Bedah.jpg',
    'tags' => ['Bedah', 'Teknologi', 'Minimal Invasif', 'Kesehatan', 'Operasi'],
    'badge' => 'Bedah',
    'penulis' => 'dr. Siti Rahmawati, Sp.B',
    'tanggal' => '2024-08-10',
  ]
];

// Ambil kategori dari URL jika ada
$kategori_filter = isset($_GET['kategori']) ? $_GET['kategori'] : null;

// Filter artikel jika kategori dipilih
$artikel_tampil = $kategori_filter ? array_filter($artikel, function($a) use ($kategori_filter) {
  return $a['kategori'] === $kategori_filter;
}) : $artikel;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah Sakit Kartini</title>
  <link rel="stylesheet" href="home.css">
  <style>
    body { background: #fafbfc; }
    .artikel-list {
      display: flex;
      flex-direction: column;
      gap: 40px;
      margin-bottom: 32px;
      width: 100%;
    }
    .artikel-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 16px rgba(0,0,0,0.07);
      padding: 0 0 32px 0;
      display: flex;
      flex-direction: column;
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
      overflow: hidden;
    }
    .artikel-image-wrapper {
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
    .artikel-image-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .badge-artikel {
      position: absolute;
      top: 24px;
      left: 24px;
      background: #f47b20;
      color: #fff;
      font-weight: 600;
      border-radius: 8px;
      padding: 7px 18px;
      font-size: 1rem;
      letter-spacing: 1px;
      z-index: 2;
    }
    .artikel-body {
      padding: 32px 40px 0 40px;
    }
    .artikel-body .author {
      color: #1976d2;
      font-size: 1rem;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .artikel-body .date {
      color: #888;
      font-size: 0.98rem;
    }
    .artikel-body h1 {
      font-size: 2.1rem;
      font-weight: 700;
      margin: 10px 0 18px 0;
      color: #22314a;
    }
    .artikel-body .summary {
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
    .container {
      display: flex;
      gap: 32px;
      align-items: flex-start;
    }
    @media (max-width: 900px) {
      .main-article-container, .container {
        flex-direction: column;
        gap: 0;
      }
      .artikel-card, .artikel-content {
        padding: 0 0 24px 0;
      }
      .artikel-body {
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
            <a href="register.php"><button class="btn-daftar">Daftar</button></a>
        <?php endif; ?>
        </nav>
  </header>
<!--Navbar End-->
<div class="container">
  <div class="artikel-list">
    <?php foreach ($artikel_tampil as $i => $a): ?>
    <article class="artikel-card">
      <div class="artikel-image-wrapper">
        <img src="<?= htmlspecialchars($a['img']) ?>" alt="<?= htmlspecialchars($a['judul']) ?>" />
        <span class="badge-artikel"><?= htmlspecialchars($a['badge']) ?></span>
      </div>
      <div class="artikel-body">
        <div class="author">
          <span>by <?= htmlspecialchars($a['penulis']) ?></span>
          <span class="date">📅 <?= htmlspecialchars($a['tanggal']) ?></span>
        </div>
        <h1><?= htmlspecialchars($a['judul']) ?></h1>
        <div class="summary">
          <?= nl2br(htmlspecialchars($a['konten'])) ?>
        </div>
        <div class="sidebar-tags" style="margin-bottom:16px;">
          <?php foreach ($a['tags'] as $tag): ?>
            <span class="tag"><?= htmlspecialchars($tag) ?></span>
          <?php endforeach; ?>
        </div>
        <a href="artikel<?= $i+1 ?>.php" class="btn-readmore">Selengkapnya</a>
      </div>
    </article>
    <?php endforeach; ?>
    <?php if (empty($artikel_tampil)): ?>
      <p>Tidak ada artikel pada kategori ini.</p>
    <?php endif; ?>
  </div>
  <aside class="sidebar-artikel">
    <div class="sidebar-box">
      <h3 style="font-size:1.6rem; color:#22314a; font-weight:700; margin-bottom:18px;">Kategori</h3>
      <ul style="list-style:none; padding:0; margin:0;">
        <li style="margin-bottom:10px;">
          <a href="artikel.php" style="display:block; padding:7px 0 7px 0; color:<?= !$kategori_filter ? '#009688' : '#22314a' ?>; text-decoration:none; font-size:1.13rem; font-weight:500; transition:color 0.2s;<?= !$kategori_filter ? 'font-weight:700;' : '' ?>">Semua</a>
        </li>
        <?php
          $kategori_list = array_unique(array_map(function($a){ return $a['kategori']; }, $artikel));
          foreach ($kategori_list as $kategori):
            $isActive = ($kategori_filter === $kategori);
        ?>
          <li style="margin-bottom:10px;">
            <a href="?kategori=<?= urlencode($kategori) ?>"
               style="display:block; padding:7px 0 7px 0; color:<?= $isActive ? '#009688' : '#22314a' ?>; text-decoration:none; font-size:1.13rem; font-weight:500; transition:color 0.2s;<?= $isActive ? 'font-weight:700;' : '' ?>">
              <?= htmlspecialchars($kategori) ?>
            </a>
          </li>
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