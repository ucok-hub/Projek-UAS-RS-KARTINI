<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

// Menggunakan prepared statement untuk keamanan
$stmt = $koneksi->prepare("SELECT * FROM pasien WHERE email = ?");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Riwayat Pelayanan</h2>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='margin-bottom:20px;'>
            <p><strong>" . htmlspecialchars($row['nama_lengkap']) . "</strong><br>
            Janji: " . htmlspecialchars($row['nama_dokter']) . " - " . htmlspecialchars($row['hari_janji']) . " - " . htmlspecialchars($row['jam_mulai']) . " s/d " . htmlspecialchars($row['jam_selesai']) . "</p>
            <a href='edit_form.php?id=" . urlencode($row['id']) . "'>Edit Jadwal</a>
            <a href='delate_form.php?id=" . urlencode($row['id']) . "' onclick=\"return confirm('Yakin ingin menghapus janji ini?')\">Hapus</a>
        </div><hr>";
    }
} else {
    echo "<p>Tidak ada riwayat pelayanan ditemukan.</p>";
}
$stmt->close();
?>
