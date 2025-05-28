<?php 
session_start(); ?>
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
     <div style="font-size:1.1rem; margin-bottom:10px; opacity:0.85;">Daftar</div>
    <h1 style="font-size:2.7rem; font-weight:700; margin:0; letter-spacing:1px;">Fasilitas</h1>
  </div>
  <img src="Asset/Artikel Anak.jpg" alt="Header Artikel" style="width:100%; height:100%; object-fit:cover; position:absolute; left:0; top:0; z-index:0; opacity:0.45;" />
</div>

 <!-- Fasilitas dan Pelayanan -->
<section>
  <div class="container">
    <div class="sidebar">
      <ul>
        <li class="active" onclick="showContent('Fisioterapi')">Fisioterapi</li>
        <li class="active" onclick="showContent('radiologi')">Radiologi</li>
        <li class="active" onclick="showContent('lab')">Laboratorium</li>
        <li class="active" onclick="showContent('farmasi')">Farmasi</li>
        <li class="active" onclick="showContent('rawatInap')">Rawat Inap</li>
        <li class="active" onclick="showContent('babySpa')">Baby Spa</li>
      </ul>
    </div>
    <div class="content" id="content-area">
      <!-- Konten akan dimuat dengan JavaScript -->
    </div>
  </div>
</section>
<!-- Fasilitas dan Pelayanan End -->
<script src="script.js"></script>

<!--Script Js-->
  <script src="script.js"></script>
</body>
</html>