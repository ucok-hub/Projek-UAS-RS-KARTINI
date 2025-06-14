<?php
require 'koneksi.php';

header('Content-Type: application/json');

// Pengecekan NIK hanya untuk email user yang sedang login, bukan seluruh database
$nik = $_GET['nik'] ?? '';
$email = $_GET['email'] ?? '';

if ($nik && $email) {
    $stmt = $koneksi->prepare("SELECT COUNT(*) as total FROM users WHERE nik = ? AND email = ?");
    $stmt->bind_param("ss", $nik, $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    // valid jika nik+email ditemukan di database
    $valid = ($result && $result['total'] > 0);
    echo json_encode(['valid' => $valid]);
} else {
    echo json_encode(['valid' => false]);
}
?>
