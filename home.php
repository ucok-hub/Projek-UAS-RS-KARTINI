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
      <form class="search-doctor-form" onsubmit="cari(); return false;">
        <div style="position:relative;width:100%;">
          <div id="customDropdownWrapper" style="width:100%;">
            <input type="text" id="cariDokter" placeholder="Cari Dokter Di Sini" autocomplete="off" onfocus="showCustomDropdown()" oninput="updateCustomDropdown()" style="width:100%;border-radius:14px;padding:16px 22px;font-size:1.08rem;font-family:'Segoe UI','Poppins','Montserrat',Arial,sans-serif;text-align:center;box-shadow:0 0 0 3px #e3f0ff;border:1.5px solid #dbeafe;" />
            <div id="customDropdown" style="display:none;position:absolute;top:100%;left:0;width:100%;background:#fff;border:2px solid #f47b20;border-radius:14px;box-shadow:0 8px 32px rgba(44,120,220,0.18);z-index:1000;max-height:340px;overflow-y:auto;margin-top:6px;"></div>
          </div>
        </div>
        <button class="btn-telusuri" type="submit">
          <span class="btn-text">TELUSURI</span>
        </button>
      </form>
      <p id="hasilCari"></p>
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

  function showFullImage(src) {
    var modal = document.getElementById('modalFullImage');
    var img = document.getElementById('modalImg');
    img.src = src;
    modal.style.display = 'flex';
  }

  function closeFullImage(e) {
    if (!e || e.target.classList.contains('modal-full-img') || e.target.classList.contains('modal-close')) {
      document.getElementById('modalFullImage').style.display = 'none';
    }
  }

  // === CARI DOKTER DROPDOWN ===
  // Data dokter diambil dari Caridokter.php (nama dan spesialis)
  const daftarDokter = [
    { nama: "dr. Amelia Wahyuni, Sp.OG", spesialis: "Dokter Spesialis Kandungan" },
    { nama: "dr. Natasya Prameswari, Sp.OG", spesialis: "Dokter Spesialis Kandungan" },
    { nama: "dr. Tri Yuniarti, Sp.OG", spesialis: "Dokter Spesialis Kandungan" },
    { nama: "dr. June Elita Rahardiyanti, Sp.PD", spesialis: "Dokter Spesialis Penyakit Dalam" },
    { nama: "dr. Laila Miftakhul Jannah, Sp.PD", spesialis: "Dokter Spesialis Penyakit Dalam" },
    { nama: "dr. Daisy Widiastuti , SpA", spesialis: "Dokter Spesialis Anak" },
    { nama: "drg. Anna Purnamaningsih", spesialis: "Dokter Spesialis Gigi" },
    { nama: "drg. Rustiana Tri Widijanti", spesialis: "Dokter Spesialis Gigi" },
    { nama: "dr. Asian Edward Sagala, Sp.B", spesialis: "Dokter Spesialis Penyakit Bedah" },
    { nama: "dr. Andoko Budiwisesa, Sp.B", spesialis: "Dokter Spesialis Penyakit Bedah" }
  ];

  // Custom dropdown logic
  function showCustomDropdown() {
    updateCustomDropdown();
    document.getElementById('customDropdown').style.display = "block";
  }

  function updateCustomDropdown() {
    const input = document.getElementById('cariDokter');
    const dropdown = document.getElementById('customDropdown');
    const val = input.value.trim().toLowerCase();
    let filtered = daftarDokter.filter(d => d.nama.toLowerCase().includes(val) || d.spesialis.toLowerCase().includes(val));
    if (filtered.length === 0 && val === "") filtered = daftarDokter;
    dropdown.innerHTML = "";
    if (filtered.length > 0) {
      filtered.forEach((dokter, idx) => {
        const item = document.createElement('div');
        item.className = "custom-dropdown-item";
        item.tabIndex = 0;
        item.style.display = "flex";
        item.style.alignItems = "center";
        item.style.justifyContent = "flex-start"; // rata kiri
        item.style.padding = "14px 18px";
        item.style.fontSize = "0.97rem";
        item.style.fontFamily = "'Segoe UI','Poppins','Montserrat',Arial,sans-serif";
        item.style.color = "#222";
        item.style.cursor = "pointer";
        item.style.transition = "background 0.15s,color 0.15s";
        item.style.textAlign = "left"; // rata kiri
        item.innerHTML = `<span style="flex:1;font-weight:500;text-align:left;">${dokter.nama} <span style="color:#b0b0b0;font-weight:400;">- ${dokter.spesialis}</span></span>`;
        item.onmousedown = function(e) {
          e.preventDefault();
          input.value = `${dokter.nama} - ${dokter.spesialis}`;
          dropdown.style.display = "none";
        };
        item.onmouseover = function() {
          this.style.background = "#fff7f0";
          this.style.color = "#f47b20";
        };
        item.onmouseout = function() {
          this.style.background = "#fff";
          this.style.color = "#222";
        };
        dropdown.appendChild(item);
      });
      dropdown.style.display = "block";
    } else {
      dropdown.style.display = "none";
    }
  }

  // Hide dropdown if click outside
  document.addEventListener('mousedown', function(e) {
    const dropdown = document.getElementById('customDropdown');
    const input = document.getElementById('cariDokter');
    if (!dropdown.contains(e.target) && e.target !== input) {
      dropdown.style.display = "none";
    }
  });

  // Keyboard navigation for custom dropdown
  document.getElementById('cariDokter').addEventListener('keydown', function(e) {
    const dropdown = document.getElementById('customDropdown');
    const items = dropdown.querySelectorAll('.custom-dropdown-item');
    if (dropdown.style.display === "block" && items.length > 0) {
      let idx = -1;
      for (let i = 0; i < items.length; i++) {
        if (document.activeElement === items[i]) {
          idx = i;
          break;
        }
      }
      if (e.key === "ArrowDown") {
        e.preventDefault();
        if (idx < items.length - 1) {
          items[idx + 1].focus();
        } else if (idx === -1) {
          items[0].focus();
        }
      } else if (e.key === "ArrowUp") {
        e.preventDefault();
        if (idx > 0) {
          items[idx - 1].focus();
        }
      } else if (e.key === "Enter" && idx >= 0) {
        items[idx].dispatchEvent(new MouseEvent('mousedown'));
      }
    }
  });

  function cari() {
    const nama = document.getElementById('cariDokter').value.trim();
    if (nama === "") {
      document.getElementById('hasilCari').textContent = "Silakan masukkan nama dokter.";
      return;
    }
    if (daftarDokter.some(d => d.nama === nama)) {
      document.getElementById('hasilCari').textContent = "Dokter ditemukan: " + nama;
    } else {
      document.getElementById('hasilCari').textContent = "Dokter tidak ditemukan.";
    }
    document.getElementById('dropdownDokter').style.display = "none";
  }
</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
</script>


    <script src="script.js"></script>
  </body>
</html>
