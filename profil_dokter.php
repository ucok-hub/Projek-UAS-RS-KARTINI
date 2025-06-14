<?php
session_start();
require 'koneksi.php';

// Ambil ID dokter dari parameter GET (misal profil.php?id=1)
$dokter_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query data dokter
$sqlDokter = "SELECT * FROM dokter WHERE id = ?";
$stmt = $koneksi->prepare($sqlDokter);
$stmt->bind_param('i', $dokter_id);
$stmt->execute();
$resultDokter = $stmt->get_result();
$dokter = $resultDokter->fetch_assoc();

if (!$dokter) {
    echo "<p>Dokter tidak ditemukan.</p>";
    exit;
}

// Query jadwal dokter
$sqlJadwal = "SELECT hari, jam_mulai, jam_selesai FROM jadwal_dokter WHERE dokter_id = ?";
$stmt2 = $koneksi->prepare($sqlJadwal);
$stmt2->bind_param('i', $dokter_id);
$stmt2->execute();
$resultJadwal = $stmt2->get_result();

// Inisialisasi array jadwal per hari
$days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
$schedule = array_fill_keys($days, []); // array of array

while ($row = $resultJadwal->fetch_assoc()) {
    $hari = $row['hari'];
    $time = substr($row['jam_mulai'], 0, 5) . ' - ' . substr($row['jam_selesai'], 0, 5);
    $schedule[$hari][] = $time;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Dokter | <?= htmlspecialchars($dokter['nama']) ?></title>
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="profil_dokter.css" />
</head>
<body>
  <!-- Navbar (copy dari home.php) -->
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
        <a href="riwayat_pelayanan.php">Riwayat Pelayanan</a>
          <span style="margin-right: 10px;">Halo, <?= htmlspecialchars($_SESSION['nama']) ?></span>
          <a href="logout.php"><button class="btn-daftar">Logout</button></a>
      <?php else: ?>
          <a href="register.php"><button class="btn-daftar">Daftar</button></a>
      <?php endif; ?>
    </nav>
  </header>
  <!-- End Navbar -->

  <main class="container-profile">
    <section class="profile-header">
      <div class="photo-wrapper">
        <img src="Asset/<?= htmlspecialchars($dokter['foto']) ?>" alt="<?= htmlspecialchars($dokter['nama']) ?>" />
      </div>
      <div class="info-header">
        <h1><?= htmlspecialchars($dokter['nama']) ?></h1>
        <p class="spesialis">Spesialis <?= htmlspecialchars($dokter['spesialisasi']) ?></p>
      </div>
    </section>

    <!-- Jadwal Dokter -->
    <section class="schedule-section">
      <h2>Jadwal Dokter</h2>
      <table class="schedule-table" style="width:100%;text-align:center;">
        <thead>
          <tr>
            <?php foreach ($days as $day): ?>
              <th><?= $day ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $adaJadwal = false;
            foreach ($days as $day):
              if (!empty($schedule[$day])) $adaJadwal = true;
            endforeach;
            ?>
            <?php if ($adaJadwal): ?>
              <?php foreach ($days as $day): ?>
                <td>
                  <?php
                  if (!empty($schedule[$day])) {
                    foreach ($schedule[$day] as $jam) {
                      echo '<div style="margin-bottom:8px;">' . htmlspecialchars($jam) . '<br>';
                      // Cek login: jika sudah login ke form_pasien.php, jika belum ke register.php
                      if (isset($_SESSION['nama'])) {
                        echo '<a href="form_pasien.php?dokter_id=' . $dokter_id . '&hari=' . urlencode($day) . '&jam=' . urlencode($jam) . '">
                                <button class="btn-buat-janji">Buat Janji</button>
                              </a>';
                      } else {
                        echo '<a href="register.php"><button class="btn-buat-janji" style="margin-top:4px;padding:6px 18px;border:none;border-radius:18px;background:#2586d0;color:#fff;font-weight:500;cursor:pointer;">Buat Janji</button></a>';
                      }
                      echo '</div>';
                    }
                  } else {
                    echo '-';
                  }
                  ?>
                </td>
              <?php endforeach; ?>
            <?php else: ?>
              <td colspan="7" style="text-align:center;">Jadwal tidak tersedia</td>
            <?php endif; ?>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

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
</body>
</html>