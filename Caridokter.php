<?php
session_start();
require 'koneksi.php';
// Ambil semua dokter
$sql = "SELECT id, nama, spesialisasi, keahlian FROM dokter";
$result = $koneksi->query($sql);

// Mapping manual: dokter_id → nama file gambar di folder Asset/
$imageMap = [
    1 => 'dr. Amelia Wahyuni, Sp.OG.jpg',
    2 => 'dr. Natasya Prameswari, Sp.OG.png',
    3 => 'dr. Tri Yuniarti, Sp.OG.jpg',
    4 => 'dr. June Elita Rahardiyanti, Sp.PD.webp',
    5 => 'dr. Laila Miftakhul Jannah, Sp.PD.jpeg',
    6 => 'dr. Daisy Widiastuti , SpA.jpg',
    7 => 'drg. Anna Purnamaningsih.jpeg',
    8 => 'drg. Rustiana Tri Widijanti.jpg',
    9 => 'dr. Asian Edward Sagala, Sp.B.png',
    10 => 'dr. Andoko Budiwisesa, Sp.B.png',
    // dst...
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Dokter</title>
  <link rel="stylesheet" href="home.css" />
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

<!-- Search Bar & Filter -->
<div class="search-doctor-bar">
  <form id="formCariDokter" onsubmit="filterDokter(); return false;">
    <input type="text" id="searchNamaDokter" placeholder="Cari nama dokter..." autocomplete="off" oninput="showNamaDropdown()" onclick="showNamaDropdown()" />
    <div id="namaDropdown" class="autocomplete-dropdown" style="display:none;position:absolute;z-index:10;background:#fff;border:1px solid #ccc;width:250px;max-height:200px;overflow-y:auto;"></div>
    <select id="filterSpesialis">
      <option value="">Semua Spesialis</option>
      <option value="Kandungan">Kandungan</option>
      <option value="Anak">Anak</option>
      <option value="Bidan">Bidan</option>
      <!-- Tambahkan opsi filter lain sesuai kebutuhan -->
    </select>
    <button type="submit" class="btn-telusuri">Cari</button>
  </form>
</div>

<div class="container_dokter" id="dokterList">
  <?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
      <?php
        $dokterId = $row['id'];
        $foto = isset($imageMap[$dokterId]) ? 'Asset/' . $imageMap[$dokterId] : 'Asset/default.jpg';
      ?>
      <div class="card_dokter">
        <img src="<?= $foto ?>" alt="Foto <?= htmlspecialchars($row['nama']) ?>" class="photo" />
        <div class="info">
          <h3><?= htmlspecialchars($row['nama']) ?></h3>
          <p class="spesialis">Dokter Spesialis <?= htmlspecialchars($row['spesialisasi']) ?></p>
          <p><strong>Keahlian:</strong><br/><?= htmlspecialchars($row['keahlian'] ?: '-') ?></p>
          <a href="profil_dokter.php?id=<?= $dokterId ?>"><button>Selengkapnya</button></a>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>Tidak ada data dokter.</p>
  <?php endif; ?>
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
    <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Desna Romarta Tambun, Fitria Andriana Sari</p>
  </div>
</footer>

<!-- Script JS -->
<script src="caridokter.js"></script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
</script>
</body>
</html>

