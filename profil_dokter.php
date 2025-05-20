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
$schedule = array_fill_keys($days, '');

while ($row = $resultJadwal->fetch_assoc()) {
    $hari = $row['hari'];
    $time = substr($row['jam_mulai'], 0, 5) . ' - ' . substr($row['jam_selesai'], 0, 5);
    $schedule[$hari] .= $time . "<br>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Dokter | <?= htmlspecialchars($dokter['nama']) ?></title>
  <link rel="stylesheet" href="home.css" />
</head>
<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

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
      <table class="schedule-table">
        <thead>
          <tr>
            <?php foreach ($days as $day): ?>
              <th><?= $day ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($schedule as $times): ?>
              <td><?= $times ? $times : '-' ?></td>
            <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <!-- Footer -->
  <?php include 'footer.php'; ?>
</body>
</html>