<?php
require 'koneksi.php';
header('Content-Type: application/json');

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
if ($keyword !== '') {
    $stmt = $koneksi->prepare("SELECT nama, spesialisasi FROM dokter WHERE nama LIKE CONCAT('%', ?, '%') OR spesialisasi LIKE CONCAT('%', ?, '%') ORDER BY nama ASC LIMIT 15");
    $stmt->bind_param('ss', $keyword, $keyword);
} else {
    $stmt = $koneksi->prepare("SELECT nama, spesialisasi FROM dokter ORDER BY nama ASC LIMIT 15");
}
$stmt->execute();
$result = $stmt->get_result();
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
