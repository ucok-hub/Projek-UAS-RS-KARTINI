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
        header("Location: home.php");
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
</head>
<body>
  <div class="auth-container">
    <div class="auth-card">
      <h2>Daftar Akun</h2>
      <?php if (isset($error)): ?>
        <div style="color:red; margin-bottom:10px;"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <form action="register.php" method="POST">
    <input type="text" name="nik" placeholder="NIK" required>
    <input type="text" name="nama" placeholder="Nama Lengkap" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Daftar</button>
    </form>


      <a href="login.php" class="auth-link">Sudah punya akun? Masuk di sini</a>
    </div>
  </div>
</body>
</html>
