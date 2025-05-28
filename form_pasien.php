<?php
session_start();
require 'koneksi.php';

// Cek jika belum login, redirect ke login.php
if (empty($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

$dokter_id = isset($_GET['dokter_id']) ? (int)$_GET['dokter_id'] : 0;
$hari = isset($_GET['hari']) ? $_GET['hari'] : '';
$jam = isset($_GET['jam']) ? $_GET['jam'] : '';
$nama_dokter = '';

// Ambil nama dokter dari database berdasarkan ID
if ($dokter_id) {
    $stmt_dokter = $koneksi->prepare("SELECT nama FROM dokter WHERE id = ?");
    $stmt_dokter->bind_param("i", $dokter_id);
    $stmt_dokter->execute();
    $stmt_dokter->bind_result($nama_dokter);
    $stmt_dokter->fetch();
    $stmt_dokter->close();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];

    // Cek apakah ada janji aktif sebelumnya untuk NIK ini
    $stmt_cek = $koneksi->prepare("SELECT COUNT(*) FROM pasien WHERE nik = ? AND status = 'aktif'");
    $stmt_cek->bind_param("s", $nik);
    $stmt_cek->execute();
    $stmt_cek->bind_result($jumlah_aktif);
    $stmt_cek->fetch();
    $stmt_cek->close();

    if ($jumlah_aktif > 0) {
        echo "<script>alert('Anda masih memiliki janji yang aktif dan belum selesai. Harap selesaikan atau batalkan terlebih dahulu.'); window.location='riwayat_pelayanan.php';</script>";
        exit;
    }

    $nama_lengkap   = $_POST['nama_lengkap'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $telepon        = $_POST['telepon'];
    $email = $_SESSION['email'];

    $dokter_id      = $_POST['dokter_id'];
    $hari           = $_POST['hari'];
    $jam            = $_POST['jam'];

    // Ambil nama dokter dari ID
    $nama_dokter = '';
    if ($dokter_id) {
        $stmt_dokter = $koneksi->prepare("SELECT nama FROM dokter WHERE id = ?");
        $stmt_dokter->bind_param("i", $dokter_id);
        $stmt_dokter->execute();
        $stmt_dokter->bind_result($nama_dokter);
        $stmt_dokter->fetch();
        $stmt_dokter->close();
    }

    // Cek apakah NIK sudah terdaftar dan status masih aktif
    $cek_stmt = $koneksi->prepare("SELECT COUNT(*) FROM pasien WHERE nik = ? AND status = 'aktif'");
    $cek_stmt->bind_param("s", $nik);
    $cek_stmt->execute();
    $cek_stmt->bind_result($nik_count);
    $cek_stmt->fetch();
    $cek_stmt->close();

    if ($nik_count > 0) {
        echo "<script>alert('NIK sudah terdaftar dan masih memiliki janji aktif. Silakan gunakan NIK lain atau hubungi admin.'); window.history.back();</script>";
        exit;
    }

    // Pisahkan jam mulai dan jam selesai
    $jam_parts = explode(' - ', $jam);
    $jam_mulai = $jam_parts[0] ?? '';
    $jam_selesai = $jam_parts[1] ?? '';

    $stmt = $koneksi->prepare("INSERT INTO pasien 
        (nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, telepon, email, dokter_id, nama_dokter, hari_janji, jam_mulai, jam_selesai) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssssss", 
        $nik, $nama_lengkap, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, 
        $telepon, $email, $dokter_id, $nama_dokter, $hari, $jam_mulai, $jam_selesai);

    if ($stmt->execute()) {
        echo "<script>alert('Data pasien dan janji berhasil disimpan'); window.location='home.php';</script>";
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
        <?php if (isset($_SESSION['nama'])): ?>
            <a href="riwayat_pelayanan.php">Riwayat Pelayanan</a>
            <span style="margin-right: 10px;">Halo, <?= htmlspecialchars($_SESSION['nama']) ?></span>
            <a href="logout.php"><button class="btn-daftar">Logout</button></a>
        <?php else: ?>
            <a href="register.php"><button class="btn-daftar">Daftar</button></a>
        <?php endif; ?>
      </nav>
    </header>
    <!-- Navbar End -->

    <main class="form-pasien-container">
      <h2 class="form-title">Data Pribadi</h2>
      <form method="POST" action="" class="form-pasien">
        <?php if ($dokter_id && $hari && $jam): ?>
  <div class="form-info">
    <p style="padding: 10px; background: #e7f3ff; border-left: 5px solid #2586d0;">
      Anda membuat janji dengan dokter <strong><?= htmlspecialchars($nama_dokter) ?></strong> pada 
      <strong><?= htmlspecialchars($hari) ?></strong> pukul <strong><?= htmlspecialchars($jam) ?></strong>.
    </p>
  </div>
<?php endif; ?>
        <input type="hidden" name="dokter_id" value="<?= $dokter_id ?>">
        <input type="hidden" name="hari" value="<?= htmlspecialchars($hari) ?>">
        <input type="hidden" name="jam" value="<?= htmlspecialchars($jam) ?>">

          <div class="form-group">
                <label for="nik">Nomor Induk Kependudukan (NIK) *</label>
                <input type="text" id="nik" name="nik" maxlength="16" placeholder="16 Digit NIK" required onblur="cekNIK()">
                <small id="nik-error" style="color:red;"></small>
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
          <?php if (!empty($_SESSION['email'])): ?>
                <div class="form-group-full">
                    <label>Email Anda:</label>
                    <p><?= htmlspecialchars($_SESSION['email']) ?></p>
                </div>
            <?php endif; ?>

          <div class="form-group-full" style="text-align:right;">
              <button type="submit" class="btn-submit">Submit</button>
          </div>
      </form>
    </main>

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
        <p>All Rights Reserved ©2025 Kelompok Annisa Eka Danti, Desna Romarta Tambun,s Fitria Andriana Sari</p>
      </div>
    </footer>
    <!-- Script Google Maps dan JS -->
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBruozd2y6BfdCpnCy0JpyMeh8sv66Ksvc&callback=initialize">
    </script>
    <script>
function cekNIK() {
    const nik = document.getElementById('nik').value;
    const errorText = document.getElementById('nik-error');

    fetch('cek_nik.php?nik=' + nik)
        .then(response => response.json())
        .then(data => {
            if (!data.valid) {
                errorText.textContent = "NIK yang anda masukan salah";
                document.querySelector('button[type="submit"]').disabled = true;
            } else {
                errorText.textContent = "";
                document.querySelector('button[type="submit"]').disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            errorText.textContent = "Terjadi kesalahan saat mengecek NIK.";
            document.querySelector('button[type="submit"]').disabled = true;
        });
}
</script>


    <script src="script.js"></script>
  </body>
</html>