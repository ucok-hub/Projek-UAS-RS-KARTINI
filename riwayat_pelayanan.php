<?php
require 'koneksi.php';
session_start();
$pasien = $koneksi->query("SELECT * FROM pasien WHERE email = '{$_SESSION['email']}'");

echo "<h2>Riwayat Pelayanan</h2>";
while ($row = $pasien->fetch_assoc()) {
    echo "<div>
        <p><strong>{$row['nama_lengkap']}</strong><br>
        Janji: {$row['nama_dokter']} - {$row['hari_janji']} - {$row['jam_mulai']} s/d {$row['jam_selesai']}</p>
        <a href='edit_janji.php?id={$row['id']}'>Edit Jadwal</a>
    </div><hr>";
}
?>
