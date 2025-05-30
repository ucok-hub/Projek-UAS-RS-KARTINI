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
        $_SESSION['email'] = $email; 
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
  <script src="script.js"></script>
</body>
</html>
