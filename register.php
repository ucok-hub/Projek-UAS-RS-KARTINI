<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nama, username, nik, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_hp, email, password)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssssssss", $nama, $username, $nik, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $alamat, $no_hp, $email, $password);

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
        <input type="text" name="nama" placeholder="Nama Lengkap" required>

        <input type="text" name="nik" placeholder="NIK" required>

        <select name="jenis_kelamin" required>
          <option value="">-- Pilih Jenis Kelamin --</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>

        <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
        <input type="date" name="tanggal_lahir" required>

        <textarea name="alamat" placeholder="Alamat Lengkap" required></textarea>

        <input type="text" name="no_hp" placeholder="Nomor HP / WA" required>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Daftar</button>
      </form>

      <a href="login.php" class="auth-link">Sudah punya akun? Masuk di sini</a>
    </div>
  </div>
</body>
</html>
