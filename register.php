<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$password')";
    if ($koneksi->query($sql) === TRUE) {
        $_SESSION['nama'] = $nama;
        header("Location: home.php");
    } else {
        echo "Gagal mendaftar: " . $koneksi->error;
    }
}
?>
