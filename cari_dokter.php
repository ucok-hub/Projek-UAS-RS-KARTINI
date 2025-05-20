<?php
require 'koneksi.php';

header('Content-Type: application/json');

$nama = isset($_GET['nama']) ? trim($_GET['nama']) : '';
if ($nama === '') {
    echo json_encode(['success' => false]);
    exit;
}

$stmt = $koneksi->prepare("SELECT id FROM dokter WHERE nama LIKE CONCAT('%', ?, '%') LIMIT 1");
$stmt->bind_param('s', $nama);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    echo json_encode(['success' => true, 'id' => $row['id']]);
} else {
    echo json_encode(['success' => false]);
}
