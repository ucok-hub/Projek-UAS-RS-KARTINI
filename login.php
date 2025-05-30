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
  <script src="script.js"></script>
</body>
</html>
