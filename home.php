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
            <a href="register.html"><button class="btn-daftar">Daftar</button></a>
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
        <a href="Caridokter.php" class="btn-caridokter" style="display:inline-block;text-align:center;margin-bottom:12px;">
          CARI DOKTER
        </a>
        <div class="search-doctor-desc">
          Temukan dan kenali profil dokter serta tenaga ahli kami
        </div>
      </div>
      <form class="search-doctor-form" id="formCariDokter">
        <div style="position:relative;width:100%;">
          <div id="customDropdownWrapper" style="width:100%;">
            <input type="text" id="cariDokter" placeholder="Cari Dokter Di Sini" autocomplete="off" onfocus="showCustomDropdown()" oninput="updateCustomDropdown()" style="width:100%;border-radius:14px;padding:16px 22px;font-size:1.08rem;font-family:'Segoe UI','Poppins','Montserrat',Arial,sans-serif;text-align:center;box-shadow:0 0 0 3px #e3f0ff;border:1.5px solid #dbeafe;" />
            <input type="hidden" id="dokterIdTerpilih" name="dokterIdTerpilih" />
            <div id="customDropdown" style="display:none;position:absolute;top:100%;left:0;width:100%;background:#fff;border:2px solid #f47b20;border-radius:14px;box-shadow:0 8px 32px rgba(44,120,220,0.18);z-index:1000;max-height:340px;overflow-y:auto;margin-top:6px;"></div>
          </div>
        </div>
        <button class="btn-telusuri" type="submit">
          <span class="btn-text">TELUSURI</span>
        </button>
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
          src="gambar-rumah-sakit.jpg"
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
  <div class="artikel-list-spesial">
    <!-- Artikel Cards 1-->
    <article class="artikel-card-spesial">
      <h1 class="title">Pentingnya Imunisasi Dasar Lengkap bagi Anak</h1>
      <span class="badge">Kesehatan Anak</span>
      <p class="author">
        <i class="icon">👤</i> dr. Yuni Astari, Sp.A
        <span class="date">📅 2025-05-19</span>
      </p>
      <p class="views">👁️ 503</p>
    </article>

     <!-- Artikel Cards 2-->
    <article class="artikel-card-spesial">
      <h1 class="title">Menjaga Kesehatan Gigi Sejak Dini untuk Mencegah Karies</h1>
      <span class="badge">Kesehatan Gigi</span>
      <p class="author">
        <i class="icon">👤</i> drg. M. Rifky Syarif, Sp.KGA
        <span class="date">📅 2025-03-19</span>
      </p>
      <p class="views">👁️ 503</p>
    </article>

     <!-- Artikel Cards 3-->
    <article class="artikel-card-spesial">
      <h1 class="title">Tips Kehamilan Sehat: Panduan untuk Ibu dan Janin</h1>
      <span class="badge">Tips Kehamilan</span>
      <p class="author">
        <i class="icon">👤</i>dr. Hilda R. Kusuma, Sp.OG
        <span class="date">📅 2024-06-19</span>
      </p>
      <p class="views">👁️ 503</p>
    </article>
  </div>
  <a href="artikel.php" class="btn-selengkapnya2">Selengkapnya</a><br>  <br>          
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
    <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Fitria Andriana Sari, Desna Romana</p>
  </div>
</footer>

<!-- Script JS -->

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
</script>


    <script src="script.js"></script>
    <script>
    // Script pencarian dokter AJAX
    document.getElementById('formCariDokter').addEventListener('submit', function(e) {
      e.preventDefault();
      var nama = document.getElementById('cariDokter').value.trim();
      var dokterId = document.getElementById('dokterIdTerpilih').value;
      var hasil = document.getElementById('hasilCari');
      hasil.textContent = '';
      if (!nama) {
        hasil.textContent = 'Silakan masukkan nama dokter.';
        return;
      }
      if (dokterId) {
        window.location.href = 'profil_dokter.php?id=' + dokterId;
        return;
      }
      fetch('cari_dokter.php?nama=' + encodeURIComponent(nama))
        .then(response => response.json())
        .then(data => {
          if (data.success && data.id) {
            window.location.href = 'profil_dokter.php?id=' + data.id;
          } else {
            hasil.textContent = 'Dokter tidak ditemukan.';
          }
        })
        .catch(() => {
          hasil.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
        });
    });
    </script>
  </body>
</html>
