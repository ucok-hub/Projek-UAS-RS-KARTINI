<?php
require 'koneksi.php';

header('Content-Type: application/json');

$nik = $_GET['nik'] ?? '';
$email = $_GET['email'] ?? '';

if ($nik && $email) {
    $stmt = $koneksi->prepare("SELECT nik FROM pasien WHERE email = ? ORDER BY id DESC LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    // valid jika nik input sama dengan nik user yang login
    $valid = ($result && $result['nik'] === $nik);
    echo json_encode(['valid' => $valid]);
} else {
    echo json_encode(['valid' => false]);
}
?>
