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
    'views' => 503,
    'badge' => 'Kesehatan Anak'
  ],
  [
    'judul' => 'Menjaga Kesehatan Gigi Sejak Dini untuk Mencegah Karies',
    'kategori' => 'Gigi',
    'penulis' => 'drg. M. Rifky Syarif, Sp.KGA',
    'tanggal' => '2025-03-19',
    'konten' => 'Kesehatan gigi dan mulut adalah bagian penting dari kesehatan umum. Sayangnya, karies gigi (gigi berlubang) masih menjadi masalah utama di Indonesia, terutama pada anak-anak usia sekolah. Karies sering kali tidak menimbulkan gejala awal, namun jika dibiarkan, dapat menyebabkan nyeri, infeksi, hingga kehilangan gigi.',
    'views' => 503,
    'badge' => 'Kesehatan Gigi'
  ],
  [
    'judul' => 'Tips Kehamilan Sehat: Panduan untuk Ibu dan Janin',
    'kategori' => 'Kandungan',
    'penulis' => 'dr. Hilda R. Kusuma, Sp.OG',
    'tanggal' => '2024-06-19',
    'konten' => 'Kehamilan adalah masa yang istimewa sekaligus menantang bagi seorang wanita. Perubahan hormon, fisik, hingga emosi terjadi dalam waktu singkat. Oleh karena itu, menjaga kehamilan tetap sehat sangat penting untuk kesejahteraan ibu dan tumbuh kembang janin.',
    'views' => 503,
    'badge' => 'Tips Kehamilan'
  ],
  [
    'judul' => 'Pentingnya Pemeriksaan Rutin untuk Penyakit Dalam',
    'kategori' => 'Penyakit Dalam',
    'penulis' => 'dr. Andi Pratama, Sp.PD',
    'tanggal' => '2024-07-01',
    'konten' => 'Pemeriksaan rutin sangat penting untuk mendeteksi dini penyakit dalam seperti diabetes, hipertensi, dan gangguan ginjal. Dengan deteksi dini, pengobatan dapat dilakukan lebih efektif.',
    'views' => 210,
    'badge' => 'Penyakit Dalam'
  ],
  [
    'judul' => 'Teknologi Terkini dalam Bedah Minimal Invasif',
    'kategori' => 'Bedah',
    'penulis' => 'dr. Siti Rahmawati, Sp.B',
    'tanggal' => '2024-08-10',
    'konten' => 'Bedah minimal invasif menawarkan pemulihan lebih cepat dan risiko komplikasi lebih rendah. Teknologi ini semakin banyak digunakan di berbagai rumah sakit besar.',
    'views' => 150,
    'badge' => 'Bedah'
  ]
];

// Daftar kategori
$kategori_list = ['Anak', 'Kandungan', 'Bedah', 'Gigi', 'Penyakit Dalam'];

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
    /* Card artikel satu kolom memanjang dan lebih lebar */
    .artikel-list {
      display: flex;
      flex-direction: column;
      gap: 32px;
      margin-bottom: 32px;
      width: 100%;
    }
    .artikel-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 16px rgba(0,0,0,0.07);
      padding: 40px 64px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 220px;
      width: 100%;
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
      transition: box-shadow 0.2s;
    }
    .artikel-card:hover {
      box-shadow: 0 4px 24px rgba(0,0,0,0.13);
    }
    .container {
      display: flex;
      gap: 32px;
      align-items: flex-start;
    }
    .artikel-list {
      flex: 2;
    }
    .sidebar {
      flex: 1;
      min-width: 260px;
      max-width: 320px;
    }
    @media (max-width: 1200px) {
      .artikel-card {
        padding: 32px 24px;
        max-width: 100%;
      }
    }
    @media (max-width: 900px) {
      .container {
        flex-direction: column;
      }
      .sidebar {
        max-width: 100%;
        min-width: 0;
      }
      .artikel-list {
        width: 100%;
      }
      .artikel-card {
        padding: 24px 10px;
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
<div class="container">
  <div class="artikel-list">
    <?php foreach ($artikel_tampil as $idx => $a): ?>
    <article class="artikel-card">
      <h1 class="title"><?= htmlspecialchars($a['judul']) ?></h1>
      <span class="badge"><?= htmlspecialchars($a['badge']) ?></span>
      <p class="author">
        <i class="icon">👤</i> <?= htmlspecialchars($a['penulis']) ?>
        <span class="date">📅 <?= htmlspecialchars($a['tanggal']) ?></span>
      </p>
      <p class="content">
        <?= htmlspecialchars($a['konten']) ?>
      </p>
      <p class="views">👁️ <?= htmlspecialchars($a['views']) ?></p>
      <a href="artikel<?= $idx+1 ?>.php" class="btn-lihat" style="align-self:flex-end;margin-top:16px;background:#1976d2;color:#fff;padding:8px 20px;border-radius:8px;text-decoration:none;transition:background 0.2s;">Lihat Selengkapnya</a>
    </article>
    <?php endforeach; ?>
    <?php if (empty($artikel_tampil)): ?>
      <p>Tidak ada artikel pada kategori ini.</p>
    <?php endif; ?>
  </div>
  <aside class="sidebar">
    <!-- Hapus search-box di sini -->
    <div class="categories">
      <h3>Kategori</h3>
      <ul>
        <li><a href="artikel.php"<?= !$kategori_filter ? ' style="font-weight:bold;"' : '' ?>>Semua</a></li>
        <?php foreach ($kategori_list as $k): ?>
          <li><a href="artikel.php?kategori=<?= urlencode($k) ?>"<?= $kategori_filter === $k ? ' style="font-weight:bold;"' : '' ?>><?= htmlspecialchars($k) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </aside>
</div>
  
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
    <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Fitria Andriana Sari, Desna Romana</p>
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