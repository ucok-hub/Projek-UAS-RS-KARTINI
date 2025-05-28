<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Cek admin: username admin dan password admin123 (tanpa hash)
        if (strtolower($username) === 'admin' && $password === 'admin123') {
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];
            header("Location: admin.php");
            exit;
        }
        // User biasa, cek password hash
        if (password_verify($password, $user['password'])) {
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];
            header("Location: home.php");
            exit;
        } else {
            $error = "Password salah";
        }
    } else {
        $error = "Username tidak ditemukan";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - RS Kartini</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="login.css">
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

  <div class="login-container">
    <div class="login-card">
      <div class="login-form-section">
        <h2>Log in</h2>
        <div class="login-info">
          Apakah Anda belum memiliki Akun?
          <a href="register.php"><button type="button" class="login-btn-daftar">Daftar sekarang </button></a>
        </div>
        <?php if (isset($error)): ?>
          <div style="color:red; margin-bottom:10px;"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form class="login-form" action="login.php" method="POST">
          <input type="text" name="username" placeholder="Username" required autocomplete="username">
          <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
          <button type="submit">Log in</button>
        </form>
      </div>
      <div class="login-illustration">
        <img src="Asset/login.png" alt="Login Illustration">
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
