<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rumah Sakit Kartini</title>
    <link rel="stylesheet" href="home.css" />
  </head>
  <body>
    <!--Navbar-->
    <header>
      <div class="logo">
        <a href="home.php"
          ><img src="Asset/Logo-Image 1.png" alt="Logo RS Kartini"
        /></a>
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

    <!-- Hero Section with background image -->
    <section class="hero-section">
      <img src="Asset/Bg Foot.png" alt="Hero Background" class="hero-bg-img" />
      <div class="hero-content">
        <!-- You can add headline or promo text here if needed -->
      </div>
    </section>

    <!-- Floating Search Box -->
    <div class="search-doctor-float">
      <div class="search-doctor-header">
        <div class="search-doctor-title">CARI DOKTER</div>
        <div class="search-doctor-desc">
          Temukan dan kenali profil dokter serta tenaga ahli kami
        </div>
      </div>
      <form class="search-doctor-form" onsubmit="cari(); return false;">
        <input type="text" id="cariDokter" placeholder="Cari Dokter Di Sini" />
        <button class="btn-telusuri" type="submit">
          <span class="search-icon">🔍</span>
          <span class="btn-text">TELUSURI</span>
        </button>
      </form>
      <p id="hasilCari"></p>
    </div>

    <!--Konten Pencarian Dokter End-->

    <!-- Tentang Rumah Sakit -->
    <section class="tentang-rs">
      <div class="konten-kiri">
        <h2>TENTANG RUMAH SAKIT KARTINI</h2>

        <p><strong>Visi:</strong></p>
        <p>
          "Menjadi Rumah Sakit pilihan masyarakat yang peduli pada kesehatan
          keluarga secara menyeluruh." 
        </p>

        <p><strong>Misi:</strong></p>
        <p>
          1. Menyelenggarakan manajemen peningkatan mutu keselamatan pasien
          melalui akreditasi dan sertifikasi
        </p>
        <p>2. Meningkatkan kompetensi sumber daya manusia rumah sakit</p>
        <p>3. Melengkapi sarana dan prasarana rumah sakit secara bertahap</p>
        <p>
          4. Meningkatkan mutu pelayanan rujukan dan asuransi swasta maupun BPJS
        </p>

        <a href="profil.html" class="btn-selengkapnya">Selengkapnya</a>
      </div>

      <div class="konten-kanan">
        <img
          src="gambar-rumah-sakit.jpg"
          href="profil.html"
          alt="Rumah Sakit Kartini"
        />
      </div>
    </section>
    <!-- Tentang Rumah Sakit End -->

    <!--Penawaran Spesial-->
    <section>
      <div class="judul-container">
        <h1>PENAWARAN SPESIAL</h1>
      </div>
      <div class="grid-3">
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
      </div>
      <br />
      <a href="spesial.html" class="btn-selengkapnya2">Selengkapnya</a>
    </section>
    <!--Penawaran Spesial End-->

    <!--Fasilitas dan Pelayanan-->
    <section>
      <div class="judul-container">
        <h1>FASILITAS & PELAYANAN</h1>
      </div>
      <div class="container">
        <div class="sidebar">
          <ul>
            <li class="active" onclick="showContent('Fisioterapi')">
              Fisioterapi
            </li>
            <li onclick="showContent('radiologi')">Radiologi</li>
            <li onclick="showContent('lab')">Laboratorium</li>
            <li onclick="showContent('farmasi')">Farmasi</li>
            <li onclick="showContent('rawatInap')">Rawat Inap</li>
            <li onclick="showContent('babySpa')">Baby Spa</li>
          </ul>
        </div>

        <div class="content" id="content-area">
          <!-- Content will be loaded by JS -->
        </div>
      </div>
    </section>

    <!--Fasilitas dan Pelayanan End-->

    <!--Artikel Terkini-->
    <section>
      <div class="judul-container">
        <h1>ARTIKEL TERKINI</h1>
      </div>
      <div class="artikel">
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
      </div>
      <br />
      <a href="fasilitas.html" class="btn-selengkapnya2">Selengkapnya</a>
    </section>
    <!--Artikel Terkini End-->

    <!--Footer-->
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-map">
          <!-- Ganti src dengan embed Google Maps nantinya -->
          <div class="map-placeholder"></div>
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
          All Rights Reserved ©2025 Kelompok AnnisaEkaDanti FitriaAndrianaSari
          DesnaRomana
        </p>
      </div>
    </footer>

    <!--Footer End-->

    <!--Script Js-->
    <script src="script.js"></script>
  </body>
</html>
