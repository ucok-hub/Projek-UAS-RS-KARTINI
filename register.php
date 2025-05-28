<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nik, nama, username, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssss", $nik, $nama, $username, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['nama'] = $nama;
        header("Location: home.php"); // Arahkan ke halaman edit profil
        exit;
    } else {
        $error = "Gagal mendaftar: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Akun - RS Kartini</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="register.css">
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
        <a href="register.php"><button class="btn-daftar">Daftar</button></a>
      <?php endif; ?>
    </nav>
  </header>
  <!--Navbar End-->

  <div class="container-auth">
    <div class="card-auth">
      <div class="auth-illustration">
        <!-- Ganti src dengan ilustrasi SVG/PNG sesuai kebutuhan -->
        <img src="Asset/register.png" alt="Register Illustration">
      </div>
      <div class="auth-form-section">
        <h2>Daftar Akun</h2>
        <?php if (isset($error)): ?>
          <div style="color:red; margin-bottom:10px;"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form class="auth-form" action="register.php" method="POST">
          <input type="text" name="nik" placeholder="NIK" required>
          <input type="text" name="nama" placeholder="Nama Lengkap (Sesuai KTP)" required>
          <input type="text" name="username" placeholder="Username" required>
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password (Min 8 Karakter)" required>
          <input type="password" name="ulangi_password" placeholder="Ulangi Password" required>
          <button type="submit">Registrasi</button>
        </form>
        <a href="login.php" class="auth-link">Sudah punya akun? Masuk di sini</a>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-map">
        <div id="googleMap" style="width: 100%; height: 250px;"></div>
      </div>
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
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
  </script>
  <script src="script.js"></script>
</body>
</html>
