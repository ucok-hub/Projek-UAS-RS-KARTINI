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
            <span style="margin-right: 10px;">Halo, <?= htmlspecialchars($_SESSION['nama']) ?></span>
            <a href="logout.php"><button class="btn-daftar">Logout</button></a>
        <?php else: ?>
            <a href="register.html"><button class="btn-daftar">Daftar</button></a>
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
    <!-- Dokter 1 -->
    <div class="card_dokter">
      <img src="Asset/dr. Amelia Wahyuni, Sp.OG.jpg" alt="dr. Amelia Wahyuni, Sp.OG" class="photo" />
      <div class="info">
        <h3>dr. Amelia Wahyuni, Sp.OG</h3>
        <p class="spesialis">Dokter Spesialis Kandungan</p>
        <p><strong>Keahlian:</strong><br/>-</p>
        <button>Selengkapnya</button>
      </div>
    </div>

    <!-- Dokter 2 -->
    <div class="card_dokter">
      <img src="Asset/dr. Natasya Prameswari, Sp.OG.png" alt="dr. Natasya Prameswari, Sp.OG" class="photo" />
      <div class="info">
        <h3>dr. Natasya Prameswari, Sp.OG</h3>
        <p class="spesialis">Dokter Spesialis Kandungan</p>
        <p><strong>Keahlian:</strong><br/>
        </p>
        <button>Selengkapnya</button>
      </div>
    </div>

    <!-- Dokter 3 -->
    <div class="card_dokter">
      <img src="Asset/dr. Tri Yuniarti, Sp.OG.jpg" alt="dr. Tri Yuniarti, Sp.OG" class="photo" />
      <div class="info">
        <h3>dr. Tri Yuniarti, Sp.OG</h3>
        <p class="spesialis">Dokter Spesialis Kandungan</p>
        <p><strong>Keahlian:</strong><br/>-</p>
        <button>Selengkapnya</button>
      </div>
    </div>

    <!-- Dokter 4 -->
    <div class="card_dokter">
      <img src="Asset/dr. June Elita Rahardiyanti, Sp.PD.webp" alt="dr. June Elita Rahardiyanti, Sp.PD" class="photo" />
      <div class="info">
        <h3>dr. June Elita Rahardiyanti, Sp.PD</h3>
        <p class="spesialis">Dokter Spesialis Penyakit Dalam</p>
        <p><strong>Keahlian:</strong><br/>
        </p>
        <button>Selengkapnya</button>
      </div>
    </div>


    <!-- Dokter 5 -->
    <div class="card_dokter">
      <img src="Asset/dr. Laila Miftakhul Jannah, Sp.PD.jpeg" alt="dr. Laila Miftakhul Jannah, Sp.PD" class="photo" />
      <div class="info">
        <h3>dr. Laila Miftakhul Jannah, Sp.PD</h3>
        <p class="spesialis">Dokter Spesialis Penyakit Dalam</p>
        <p><strong>Keahlian:</strong><br/>
        </p>
        <button>Selengkapnya</button>
      </div>
    </div>

      <!-- Dokter 6 -->
    <div class="card_dokter">
      <img src="Asset/dr. Daisy Widiastuti , SpA.jpg" alt="dr. Daisy Widiastuti , SpA" class="photo" />
      <div class="info">
        <h3>dr. Daisy Widiastuti , SpA</h3>
        <p class="spesialis">Dokter Spesialis Anak</p>
        <p><strong>Keahlian:</strong><br/>
        </p>
        <button>Selengkapnya</button>
      </div>
    </div>

    <!-- Dokter 7 -->
    <div class="card_dokter">
      <img src="Asset/drg. Anna Purnamaningsih.jpeg " alt="drg. Anna Purnamaningsih" class="photo" />
      <div class="info">
        <h3>drg. Anna Purnamaningsih</h3>
        <p class="spesialis">Dokter Spesialis Gigi</p>
        <p><strong>Keahlian:</strong><br/>
        </p>
        <button>Selengkapnya</button>
      </div>
    </div>

    <!-- Dokter 8 -->
    <div class="card_dokter">
      <img src="Asset/drg. Rustiana Tri Widijanti.jpg" alt="drg. Rustiana Tri Widijanti" class="photo" />
      <div class="info">
        <h3>drg. Rustiana Tri Widijanti</h3>
        <p class="spesialis">Dokter Spesialis Gigi</p>
        <p><strong>Keahlian:</strong><br/>
        </p>
        <button>Selengkapnya</button>
      </div>
    </div>

    <!-- Dokter 9 -->
    <div class="card_dokter">
      <img src="Asset/dr. Asian Edward Sagala, Sp.B.png" alt="dr. Asian Edward Sagala, Sp.B" class="photo" />
      <div class="info">
        <h3>dr. Asian Edward Sagala, Sp.B</h3>
        <p class="spesialis">Dokter Spesialis Penyakit Bedah</p>
        <p><strong>Keahlian:</strong><br/>
        </p>
        <button>Selengkapnya</button>
      </div>
    </div>

    <!-- Dokter 10 -->
    <div class="card_dokter">
      <img src="Asset/dr. Andoko Budiwisesa, Sp.B.png" alt="dr. Andoko Budiwisesa, Sp.B" class="photo" />
      <div class="info">
        <h3>dr. Andoko Budiwisesa, Sp.B</h3>
        <p class="spesialis">Dokter Spesialis Penyakit Bedah</p>
        <p><strong>Keahlian:</strong><br/>
        </p>
        <button>Selengkapnya</button>
      </div>
    </div>
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
<script src="caridokter.js"></script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
</script>
</body>
</html>

