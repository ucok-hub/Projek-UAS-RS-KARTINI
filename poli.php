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

<!--Navigasi Poli-->
<section class="poli-klinik">
  <h1>POLI KLINIK</h1>
  <div class="garis-aktif"></div>
  <div class="daftar-klinik">
    <ul>
      <li><a href="polikandungan.php">Klinik Kandungan</a></li>
      <li><a href="polianak.php">Klinik Anak</a></li>
      <li><a href="polibedah.php">Klinik Bedah Umum</a></li>
      <li><a href="polipd.php   ">Klinik Penyakit Dalam</a></li>
      <li><a href="poligigi.php">Klinik Gigi</a></li>
    </ul>
  </div>
</section>
<!--Navigasi Poli End-->

<!--Script Js-->
  <script src="script.js"></script>
</body>
</html>