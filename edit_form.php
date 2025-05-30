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

// Ambil data dokter berdasarkan nama_dokter pada janji
$dokter = [];
$dokter_id = 0;
$stmt = $koneksi->prepare("SELECT * FROM dokter WHERE nama = ?");
$stmt->bind_param("s", $data['nama_dokter']);
$stmt->execute();
$dokter_result = $stmt->get_result();
if ($dokter_result) {
    $dokter = $dokter_result->fetch_assoc();
    $dokter_id = $dokter['id'] ?? 0;
}
$stmt->close();

if (!$data) {
    echo "Data tidak ditemukan atau akses ditolak.";
    exit;
}

// Ambil hanya jadwal milik dokter yang dipilih pasien
$jadwal = [];
$q = $koneksi->prepare("SELECT id, hari, jam_mulai, jam_selesai FROM jadwal_dokter WHERE dokter_id = ?");
$q->bind_param("i", $dokter_id);
$q->execute();
$result = $q->get_result();
while ($row = $result->fetch_assoc()) {
    $jadwal[] = $row;
}
$q->close();

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah sudah pernah edit (kolom 'edited' di tabel pasien)
    if (isset($data['edited']) && $data['edited'] == 1) {
        echo "<script>alert('Anda hanya dapat mengedit jadwal satu kali.'); window.location='riwayat_pelayanan.php';</script>";
        exit;
    }

    $jadwal_id = $_POST['jadwal_id'];
    // Ambil detail jadwal terpilih
    $stmt = $koneksi->prepare("SELECT hari, jam_mulai, jam_selesai FROM jadwal_dokter WHERE id = ?");
    $stmt->bind_param("i", $jadwal_id);
    $stmt->execute();
    $jadwal_result = $stmt->get_result();
    $jadwal_data = $jadwal_result->fetch_assoc();
    $stmt->close();

    if ($jadwal_data) {
        $hari = $jadwal_data['hari'];
        $jam_mulai = $jadwal_data['jam_mulai'];
        $jam_selesai = $jadwal_data['jam_selesai'];

        // Cek apakah user sudah punya janji lain di jam dokter yang sama (selain janji ini)
        $stmt_cek = $koneksi->prepare("SELECT COUNT(*) as cek FROM pasien WHERE email = ? AND dokter_id = ? AND hari_janji = ? AND jam_mulai = ? AND id != ?");
        $stmt_cek->bind_param("sissi", $email, $dokter_id, $hari, $jam_mulai, $id);
        $stmt_cek->execute();
        $cek = $stmt_cek->get_result()->fetch_assoc();
        $stmt_cek->close();
        if ($cek['cek'] > 0) {
            echo "<script>alert('Anda sudah memiliki janji dengan dokter dan jam ini pada hari yang sama. Silakan pilih jadwal lain.'); window.location='edit_form.php?id=$id';</script>";
            exit;
        }

        // Update jadwal dan set edited=1
        $stmt = $koneksi->prepare("UPDATE pasien SET hari_janji = ?, jam_mulai = ?, jam_selesai = ?, edited = 1 WHERE id = ? AND email = ?");
        $stmt->bind_param("sssis", $hari, $jam_mulai, $jam_selesai, $id, $email);

        if ($stmt->execute()) {
            // Urutkan ulang nomor antrian untuk jadwal yang sama
            $stmt_urut = $koneksi->prepare("SELECT id FROM pasien WHERE dokter_id = ? AND hari_janji = ? AND jam_mulai = ? ORDER BY id ASC");
            $stmt_urut->bind_param("iss", $dokter_id, $hari, $jam_mulai);
            $stmt_urut->execute();
            $result_urut = $stmt_urut->get_result();
            $nomor = 1;
            while ($row_urut = $result_urut->fetch_assoc()) {
                $stmt_update = $koneksi->prepare("UPDATE pasien SET nomor_antrian = ? WHERE id = ?");
                $stmt_update->bind_param("ii", $nomor, $row_urut['id']);
                $stmt_update->execute();
                $stmt_update->close();
                $nomor++;
            }
            $stmt_urut->close();
            echo "<script>alert('Jadwal berhasil diupdate. Anda tidak dapat mengedit lagi.'); window.location='riwayat_pelayanan.php';</script>";
        } else {
            echo "Gagal update: " . $stmt->error;
        }
        $stmt->close();
        exit;
    } else {
        echo "Jadwal dokter tidak ditemukan.";
        exit;
    }
}

// Tambahan: cek juga jika sudah pernah edit
$boleh_edit = true;
if (isset($data['edited']) && $data['edited'] == 1) {
    $boleh_edit = false;
}
?>

<link rel="stylesheet" href="edit_form.css">
<style>
.edit-form-container {
    max-width: 480px;
    margin: 40px auto;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 2px 12px rgba(37,134,208,0.10);
    padding: 32px 28px 24px 28px;
}
.edit-form-title {
    text-align: center;
    color: #2586d0;
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 18px;
}
.doctor-profile {
    display: flex;
    align-items: flex-start;
    gap: 18px;
    margin-bottom: 28px;
    background: linear-gradient(90deg, #e3f0ff 60%, #f5fff9 100%);
    border-radius: 14px;
    padding: 18px 16px;
    box-shadow: 0 1px 6px rgba(37,134,208,0.08);
}
.doctor-photo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #2586d0;
    background: #fff;
}
.doctor-info {
    flex: 1;
}
.doctor-name {
    font-size: 1.15em;
    font-weight: bold;
    color: #222;
    margin-bottom: 4px;
}
.doctor-specialist {
    color: #2586d0;
    font-size: 1em;
    margin-bottom: 6px;
}
.doctor-desc {
    color: #444;
    font-size: 0.97em;
}
.edit-form label {
    font-weight: bold;
    color: #2586d0;
}
.edit-form select {
    width: 100%;
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #b5d2f3;
    margin-top: 4px;
    margin-bottom: 12px;
    font-size: 1em;
}
.btn-edit-submit {
    background: linear-gradient(90deg, #2586d0 60%, #43cea2 100%);
    color: #fff;
    padding: 10px 28px;
    border-radius: 24px;
    font-weight: bold;
    font-size: 1em;
    border: none;
    outline: none;
    cursor: pointer;
    transition: background 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(37,134,208,0.10);
}
.btn-edit-submit:hover {
    background: linear-gradient(90deg, #43cea2 0%, #2586d0 100%);
    box-shadow: 0 4px 16px rgba(37,134,208,0.18);
}
</style>

<h2 class="edit-form-title">Edit Janji</h2>
<div class="edit-form-container">
    <?php if ($dokter): ?>
    <section class="profile-header" style="display:flex;align-items:center;gap:18px;margin-bottom:18px;">
      <div class="photo-wrapper" style="flex-shrink:0;">
        <img src="Asset/<?= htmlspecialchars($dokter['foto']) ?>" alt="<?= htmlspecialchars($dokter['nama']) ?>" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:2px solid #2586d0;background:#fff;">
      </div>
      <div class="info-header">
        <h1 style="margin:0;font-size:1.25em;color:#222;"><?= htmlspecialchars($dokter['nama']) ?></h1>
        <p class="spesialis" style="margin:2px 0 0 0;color:#2586d0;">Spesialis <?= htmlspecialchars($dokter['spesialisasi']) ?></p>
      </div>
    </section>
    <?php endif; ?>
    <?php if ($data): ?>
    <div class="patient-profile" style="display:flex;align-items:flex-start;gap:18px;margin-bottom:22px;background:linear-gradient(90deg,#f5fff9 60%,#e3f0ff 100%);border-radius:14px;padding:16px 16px 12px 16px;box-shadow:0 1px 6px rgba(37,134,208,0.06);">
        <div style="flex:1;">
            <div style="font-weight:bold;color:#2586d0;font-size:1.08em;margin-bottom:2px;">Data Pasien</div>
            <div style="color:#222;"><b>Nama:</b> <?= htmlspecialchars($data['nama_lengkap'] ?? '-') ?></div>
            <div style="color:#222;"><b>Email:</b> <?= htmlspecialchars($data['email'] ?? '-') ?></div>
            <div style="color:#222;"><b>NIK:</b> <?= htmlspecialchars($data['nik'] ?? '-') ?></div>
            <div style="color:#222;"><b>Tempat Lahir:</b> <?= htmlspecialchars($data['tempat_lahir'] ?? '-') ?></div>
            <div style="color:#222;"><b>Tanggal Lahir:</b> <?= htmlspecialchars($data['tanggal_lahir'] ?? '-') ?></div>
            <div style="color:#222;"><b>Jenis Kelamin:</b> <?= htmlspecialchars($data['jenis_kelamin'] ?? '-') ?></div>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($boleh_edit): ?>
    <form method="POST" class="edit-form">
        <label>Pilih Jadwal Dokter:</label><br>
        <select name="jadwal_id" required>
            <option value="">-- Pilih Jadwal --</option>
            <?php foreach ($jadwal as $j): 
                $selected = ($data['hari_janji'] == $j['hari'] && $data['jam_mulai'] == $j['jam_mulai'] && $data['jam_selesai'] == $j['jam_selesai']) ? 'selected' : '';
                ?>
                <option value="<?= $j['id'] ?>" <?= $selected ?>>
                    <?= htmlspecialchars($j['hari']) ?>, <?= htmlspecialchars($j['jam_mulai']) ?> - <?= htmlspecialchars($j['jam_selesai']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" class="btn-edit-submit">Simpan</button>
    </form>
    <?php else: ?>
    <button class="btn-edit-submit" style="width:100%;opacity:0.6;cursor:not-allowed;" disabled>Edit Jadwal (hanya bisa sekali)</button>
    <?php endif; ?>
</div>
