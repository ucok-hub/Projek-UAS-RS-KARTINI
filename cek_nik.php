<?php
require 'koneksi.php';

header('Content-Type: application/json');

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    $stmt = $koneksi->prepare("SELECT nik FROM users WHERE nik = ?");
    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $result = $stmt->get_result();

    echo json_encode(['valid' => $result->num_rows > 0]);
    $stmt->close();
} else {
    echo json_encode(['valid' => false]);
}
?>
