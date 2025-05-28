<?php
require 'koneksi.php';
session_start();

$nik = $_SESSION['nik'];

$query = $koneksi->prepare("SELECT * FROM janji WHERE nik = ? ORDER BY created_at DESC");
$query->bind_param("s", $nik);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pelayanan</title>
  <link rel="stylesheet" href="riwayat.css">
</head>
<body>
  <header>
    <nav>
      <a href="home.php">Beranda</a>
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
  <h2>Riwayat Pelayanan Anda</h2>
  <table>
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Poli</th>
        <th>Waktu</th>
        <th>Keluhan</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['tanggal']) ?></td>
          <td><?= htmlspecialchars($row['poli']) ?></td>
          <td><?= htmlspecialchars($row['waktu']) ?></td>
          <td><?= htmlspecialchars($row['keluhan']) ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
