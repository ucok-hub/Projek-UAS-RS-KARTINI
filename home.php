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
    <!-- Header & Navigation -->
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
            <a href="register.php"><button class="btn-daftar">Daftar</button></a>
        <?php endif; ?>
        </nav>
    </header>
    <!-- End Header & Navigation -->

    <!-- Hero Section -->
    <section class="hero-section">
      <img src="Asset/Bg Foot.png" alt="Hero Background" class="hero-bg-img" />
      <div class="hero-content"><!-- Optional: Add headline here --></div>
    </section>
    <!-- End Hero Section -->

    <!-- Floating Search Box -->
    <div class="search-doctor-float">
      <div class="search-doctor-header">
        <span style="display:block;font-size:1.25rem;font-weight:600;color:#2c3e50;margin-bottom:2px;letter-spacing:1px;">CARI DOKTER</span>
        <div class="search-doctor-desc">
          Temukan dan kenali profil dokter serta tenaga ahli kami
        </div>
      </div>
      <form class="search-doctor-form" id="formCariDokter" action="Caridokter.php" method="get" style="display:flex;gap:16px;align-items:center;">
        <div style="flex:1;position:relative;width:100%;">
          <div id="customDropdownWrapper" style="width:100%;">
            <input type="text" id="cariDokter" name="nama" placeholder="Cari Dokter Di Sini" autocomplete="off" onfocus="showCustomDropdown()" oninput="updateCustomDropdown()" style="width:100%;border-radius:14px;padding:16px 22px;font-size:1.08rem;font-family:'Segoe UI','Poppins','Montserrat',Arial,sans-serif;text-align:center;box-shadow:0 0 0 3px #e3f0ff;border:1.5px solid #dbeafe;" />
            <input type="hidden" id="dokterIdTerpilih" name="dokterIdTerpilih" />
            <div id="customDropdown" style="display:none;position:absolute;top:100%;left:0;width:100%;background:#fff;border:2px solid #f47b20;border-radius:14px;box-shadow:0 8px 32px rgba(44,120,220,0.18);z-index:1000;max-height:340px;overflow-y:auto;margin-top:6px;"></div>
          </div>
        </div>
        <button class="btn-telusuri" type="submit" style="background:#f47b20;color:#fff;font-weight:700;font-size:1.1rem;padding:0 38px;height:48px;border:none;border-radius:24px;box-shadow:0 2px 8px rgba(244,123,32,0.08);cursor:pointer;transition:background 0.2s;">TELUSURI</button>
      </form>
      <p id="hasilCari" style="color:red;"></p>
    </div>
    <!-- End Floating Search Box -->

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
          src="Asset/Bidan Kartini, SSiT, MKES.png"
          href="profil.html"
          alt="Rumah Sakit Kartini"
        />
      </div>
    </section>
    <!-- Tentang Rumah Sakit End -->

      <!-- Penawaran Spesial -->
      <section>
  <div class="judul-container">
    <h1>PENAWARAN SPESIAL</h1>
  </div>
  <div class="grid-3">
    <div class="card-spesial" onclick="showFullImage('Asset/Baby Spa.jpeg')">
      <img src="Asset/Baby Spa.jpeg" alt="Baby Spa" />
      <div class="card-title">Promo Baby Spa</div>
      <!-- <div class="card-desc">Deskripsi singkat promo...</div> -->
    </div>
    <div class="card-spesial" onclick="showFullImage('Asset/Countura Treatment.jpeg')">
      <img src="Asset/Countura Treatment.jpeg" alt="Countura Treatmen" />
      <div class="card-title">Diskon Countura Treatmen</div>
    </div>
    <div class="card-spesial" onclick="showFullImage('Asset/Klinik Kecantikan.jpeg')">
      <img src="Asset/Klinik Kecantikan.jpeg" alt="Paket Perawatan Pasca Lahiran" />
      <div class="card-title">Paket Perawatan Pasca Lahiran</div>
    </div>
  </div>
  <div class="penawaran-center">
    <a href="spesial.html" class="btn-selengkapnya2">Selengkapnya</a>
  </div>
  <!-- Modal for full image -->
  <div id="modalFullImage" class="modal-full-img" onclick="closeFullImage()" style="display:none;">
    <span class="modal-close" onclick="closeFullImage(event)">&times;</span>
    <img id="modalImg" src="" alt="Full" />
  </div>
</section>
      <!-- End Penawaran Spesial -->

      <!-- Fasilitas dan Pelayanan -->
      <section>
        <div class="judul-container">
          <h1>FASILITAS & PELAYANAN</h1>
        </div>
        <div class="container">
          <aside class="sidebar">
            <ul>
              <li class="active" onclick="showContent('Fisioterapi', this)">
                Fisioterapi
              </li>
              <li onclick="showContent('radiologi', this)">Radiologi</li>
              <li onclick="showContent('lab', this)">Laboratorium</li>
              <li onclick="showContent('farmasi', this)">Farmasi</li>
              <li onclick="showContent('rawatInap', this)">Rawat Inap</li>
              <li onclick="showContent('babySpa', this)">Baby Spa</li>
            </ul>
          </aside>
          <section class="content" id="content-area">
            <!-- Content will be loaded by JS -->
          </section>
        </div>
      </section>
      <!-- End Fasilitas dan Pelayanan -->

    <!--Fasilitas dan Pelayanan End-->


    <!--Artikel Terkini-->
    
    <section>
      <div class="judul-container">
          <h1>ARTIKEL TERKINI</h1>
        </div>
      <div class="artikel-terkini-cards" style="display:flex;gap:32px;justify-content:center;flex-wrap:wrap;margin-bottom:32px;">
        <!-- Artikel Card 1 -->
        <div class="artikel-terkini-card" style="background:#fff;border-radius:24px;box-shadow:0 4px 24px rgba(44,62,80,0.08);width:340px;overflow:hidden;display:flex;flex-direction:column;">
          <img src="Asset/Artikel Anak.jpg" alt="Direct Your Mindset Influence Of Your Future" style="width:100%;height:200px;object-fit:cover;">
          <div style="padding:24px 20px 18px 20px;">
            <div style="color:#6b7280;font-size:0.98rem;margin-bottom:8px;display:flex;align-items:center;gap:6px;">
              <span style="display:inline-block;">&#128197;</span> 2025-05-19
            </div>
            <div style="font-weight:700;font-size:1.18rem;color:#10204b;margin-bottom:16px;line-height:1.3;">
             Pentingnya Imunisasi Dasar Lengkap bagi Anak
            </div>
            <a href="artikel1.php" style="color:#0a2b7e;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:4px;">
              Read More <span style="font-size:1.1em;">&#8594;</span>
            </a>
          </div>
        </div>
        <!-- Artikel Card 2 -->
        <div class="artikel-terkini-card" style="background:#fff;border-radius:24px;box-shadow:0 4px 24px rgba(44,62,80,0.08);width:340px;overflow:hidden;display:flex;flex-direction:column;border:1.5px solid #0fa3b1;">
          <img src="Asset/Artikel Gigi.jpg" alt="Focus Your Intentions, Manifest Your Dreams" style="width:100%;height:200px;object-fit:cover;">
          <div style="padding:24px 20px 18px 20px;">
            <div style="color:#6b7280;font-size:0.98rem;margin-bottom:8px;display:flex;align-items:center;gap:6px;">
              <span style="display:inline-block;">&#128197;</span> 2025-03-19
            </div>
            <div style="font-weight:700;font-size:1.18rem;color:#10204b;margin-bottom:16px;line-height:1.3;">
              Menjaga Kesehatan Gigi Sejak Dini untuk Mencegah Karies
            </div>
            <a href="artikel2.php" style="color:#0a2b7e;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:4px;">
              Read More <span style="font-size:1.1em;">&#8594;</span>
            </a>
          </div>
        </div>
        <!-- Artikel Card 3 -->
        <div class="artikel-terkini-card" style="background:#fff;border-radius:24px;box-shadow:0 4px 24px rgba(44,62,80,0.08);width:340px;overflow:hidden;display:flex;flex-direction:column;">
          <img src="Asset/Artikel Bedah.jpg" alt="Align Your Actions, Achieve Your Aspirations" style="width:100%;height:200px;object-fit:cover;">
          <div style="padding:24px 20px 18px 20px;">
            <div style="color:#6b7280;font-size:0.98rem;margin-bottom:8px;display:flex;align-items:center;gap:6px;">
              <span style="display:inline-block;">&#128197;</span>  2024-08-10
            </div>
            <div style="font-weight:700;font-size:1.18rem;color:#10204b;margin-bottom:16px;line-height:1.3;">
              Teknologi Terkini dalam Bedah Minimal Invasif
            </div>
            <a href="artikel5.php" style="color:#0a2b7e;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:4px;">
              Read More <span style="font-size:1.1em;">&#8594;</span>
            </a>
          </div>
        </div>
      </div>
      <div style="text-align:center;">
        <a href="artikel.php" class="btn-selengkapnya2">Selengkapnya</a>
      </div>
      <br><br>
    </section>
    <!--Artikel Terkini End-->

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

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
</script>


    <script src="script.js"></script>
    <script>
    </script>
  </body>
</html>
