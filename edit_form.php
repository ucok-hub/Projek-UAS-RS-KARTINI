<?php
require 'koneksi.php';
session_start();

$id = $_GET['id'] ?? 0;
$email = $_SESSION['email'] ?? '';

// Ambil data janji pasien
$stmt = $koneksi->prepare("SELECT * FROM pasien WHERE id = ? AND email = ?");
$stmt->bind_param("is", $id, $email);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    echo "Data tidak ditemukan atau akses ditolak.";
    exit;
}

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $jam_parts = explode(' - ', $jam);
    $jam_mulai = $jam_parts[0] ?? '';
    $jam_selesai = $jam_parts[1] ?? '';

    $stmt = $koneksi->prepare("UPDATE pasien SET hari_janji = ?, jam_mulai = ?, jam_selesai = ? WHERE id = ? AND email = ?");
    $stmt->bind_param("sssis", $hari, $jam_mulai, $jam_selesai, $id, $email);
    
    if ($stmt->execute()) {
        echo "<script>alert('Jadwal berhasil diupdate'); window.location='riwayat_pelayanan.php';</script>";
    } else {
        echo "Gagal update: " . $stmt->error;
    }
    $stmt->close();
    exit;
}
?>

<link rel="stylesheet" href="edit_form.css">

<h2 class="edit-form-title">Edit Janji</h2>
<div class="edit-form-container">
<form method="POST" class="edit-form">
    <label>Hari:</label><br>
    <input type="text" name="hari" value="<?= htmlspecialchars($data['hari_janji']) ?>" required><br><br>

    <label>Jam (format: 08:00 - 09:00):</label><br>
    <input type="text" name="jam" value="<?= htmlspecialchars($data['jam_mulai'] . ' - ' . $data['jam_selesai']) ?>" required><br><br>

    <button type="submit" class="btn-edit-submit">Simpan</button>
</form>
</div>
