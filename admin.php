<?php
require 'koneksi.php';
session_start();

// Opsional: Validasi admin
// if (!isset($_SESSION['is_admin'])) { die('Akses ditolak'); }

// Proses ubah status jika ada request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    $id = (int)$_POST['id'];
    $status = $_POST['status'];

    $stmt = $koneksi->prepare("UPDATE pasien SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
}

// Ambil semua janji pasien
$result = $koneksi->query("SELECT * FROM pasien ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manajemen Janji Pasien</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        form { display: inline; }
        .status-aktif { color: green; font-weight: bold; }
        .status-selesai { color: gray; }
        .status-batal { color: red; }
    </style>
</head>
<body>
    <h2>Manajemen Janji Pasien</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Dokter</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Ubah Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                <td><?= htmlspecialchars($row['nama_dokter']) ?></td>
                <td><?= htmlspecialchars($row['hari_janji']) ?></td>
                <td><?= htmlspecialchars($row['jam_mulai']) ?> - <?= htmlspecialchars($row['jam_selesai']) ?></td>
                <td class="status-<?= htmlspecialchars($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <select name="status" onchange="this.form.submit()">
                            <option value="aktif" <?= $row['status'] === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="selesai" <?= $row['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="batal" <?= $row['status'] === 'batal' ? 'selected' : '' ?>>Batal</option>
                        </select>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
