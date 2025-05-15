<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['nama'] = $user['nama'];
        header("Location: home.php");
    } else {
        echo "Password salah";
    }
} else {
    echo "Email tidak ditemukan";
}
?>
