<?php
require 'koneksi.php';
session_start();

$id = $_GET['id'] ?? 0;
$email = $_SESSION['email'] ?? '';

$stmt = $koneksi->prepare("DELETE FROM pasien WHERE id = ? AND email = ?");
$stmt->bind_param("is", $id, $email);

if ($stmt->execute()) {
    echo "<script>alert('Janji berhasil dihapus'); window.location='riwayat_pelayanan.php';</script>";
} else {
    echo "Gagal menghapus janji: " . $stmt->error;
}
$stmt->close();
?>
