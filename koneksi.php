<?php
$koneksi = new mysqli("localhost", "root", "", "rskartini");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
