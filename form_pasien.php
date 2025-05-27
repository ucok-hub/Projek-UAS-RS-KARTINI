<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik            = $_POST['nik'];
    $nama_lengkap   = $_POST['nama_lengkap'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $telepon        = $_POST['telepon'];
    $email          = $_POST['email'];

    $stmt = $koneksi->prepare("INSERT INTO pasien (nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, telepon, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nik, $nama_lengkap, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $telepon, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Data pasien berhasil disimpan'); window.location='form_pasien.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: {$stmt->error}');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="form_pasien.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <!-- Navbar Start -->
    <header>
      <div class="logo">
        <a href="home.php">
          <img src="Asset/Logo-Image 1.png" alt="Logo RS Kartini" />
        </a>
      </div>
      <nav>
        <a href="poli.php">Poliklinik</a>
        <a href="fasilitas.php">Fasilitas</a>
        <a href="artikel.php">Artikel</a>
        <a href="profil.php">Tentang Kami</a>
        <a href="form_pasien.php" style="font-weight:bold;"></a>
        <?php session_start(); ?>
        <?php if (isset($_SESSION['nama'])): ?>
            <span style="margin-right: 10px;">Halo, <?= htmlspecialchars($_SESSION['nama']) ?></span>
            <a href="logout.php"><button class="btn-daftar">Logout</button></a>
        <?php else: ?>
            <a href="register.html"><button class="btn-daftar">Daftar</button></a>
        <?php endif; ?>
      </nav>
    </header>
    <!-- Navbar End -->

    <main class="form-pasien-container">
      <h2 class="form-title">Data Pribadi</h2>
      <form method="POST" action="" class="form-pasien">
          <div class="form-group">
              <label for="nik">Nomor Induk Kependudukan (NIK) *</label>
              <input type="text" id="nik" name="nik" maxlength="16" placeholder="16 Digit NIK" required>
          </div>
          <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin *</label>
              <select id="jenis_kelamin" name="jenis_kelamin" required>
                  <option value="" disabled selected>Pilih Jenis Kelamin</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
              </select>
          </div>
          <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap *</label>
              <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir *</label>
              <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="yyyy-mm-dd" required>
          </div>
          <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir *</label>
              <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
          </div>
          <div class="form-group">
              <label for="telepon">Telepon Seluler *</label>
              <input type="text" id="telepon" name="telepon" placeholder="08xx" required>
          </div>
          <div class="form-group-full">
              <label for="email">Email *</label>
              <input type="email" id="email" name="email" placeholder="Email yang dapat dihubungi" required>
          </div>
          <div class="form-group-full" style="text-align:right;">
              <button type="submit" class="btn-submit">Submit</button>
          </div>
      </form>
    </main>

    <footer>
      <div class="footer-content">
        <div class="footer-section">
          <h3>RS Kartini</h3>
          <p>Jl. Raya No. 123, Kota Semarang</p>
          <p>Telp: (024) 1234567</p>
          <p>Email: info@rskartini.com</p>
        </div>
        <div class="footer-section">
          <h3>Link Terkait</h3>
          <a href="home.php">Beranda</a>
          <a href="poli.php">Poliklinik</a>
          <a href="fasilitas.php">Fasilitas</a>
          <a href="artikel.php">Artikel</a>
          <a href="profil.php">Tentang Kami</a>
        </div>
        <div class="footer-section">
          <h3>Ikuti Kami</h3>
          <a href="#">Facebook</a>
          <a href="#">Twitter</a>
          <a href="#">Instagram</a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Desna Romarta Tambun, Fitria Andriana Sari</p>
      </div>
    </footer>

    <!-- Script Google Maps dan JS -->
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
    </script>
    <script src="script.js"></script>
</body>
</html>
