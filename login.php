<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['nama'] = $user['nama'];
            header("Location: home.php");
            exit;
        } else {
            $error = "Password salah";
        }
    } else {
        $error = "Email tidak ditemukan";
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
</head>
<body>
  <div class="auth-container">
    <div class="auth-card">
      <h2>Masuk Akun</h2>
      <?php if (isset($error)): ?>
        <div style="color:red; margin-bottom:10px;"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required autocomplete="username">
        <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
        <button type="submit">Masuk</button>
      </form>
      <a href="register.php" class="auth-link">Belum punya akun? Daftar di sini</a>
    </div>
  </div>
</body>
</html>
