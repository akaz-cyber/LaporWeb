<?php
session_start(); // Pastikan session aktif untuk mengambil data pengguna yang sedang login
require_once 'koneksi.php'; // Sesuaikan dengan file koneksi database Anda

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil id_user dari session
$id_user = $_SESSION['id_user'];

// Mengecek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];
    $nik = $_POST['nik']; // Ambil NIK dari form
    $tempat_tinggal = $_POST['tempat_tinggal']; // Ambil tempat tinggal dari form
    $penyandang_disabilitas = $_POST['penyandang_disabilitas']; // Ambil status penyandang disabilitas
    $jenis_kelamin = $_POST['jenis_kelamin']; // Ambil jenis kelamin dari form


    // Query untuk mengupdate data pengguna termasuk nik, tempat tinggal, dan penyandang disabilitas
    $sql = "UPDATE users SET nama_lengkap = ?, username = ?, email = ?, no_telp = ?, tanggal_lahir = ?, pekerjaan = ?, alamat = ?, nik = ?, tempat_tinggal = ?, penyandang_disabilitas = ?, jenis_kelamin = ? WHERE id_user = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssssssi", $nama_lengkap, $username, $email, $no_telp, $tanggal_lahir, $pekerjaan, $alamat, $nik, $tempat_tinggal, $penyandang_disabilitas, $jenis_kelamin, $id_user);
        if ($stmt->execute()) {
            header("Location: profile"); // Redirect ke halaman profil setelah berhasil update
            exit();
        } else {
            echo "Gagal mengupdate data.";
        }
        $stmt->close();
    }
     else {
        echo "Query tidak valid.";
    }
    $conn->close();
}
?>
