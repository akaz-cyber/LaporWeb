<?php
require_once('../koneksi.php');

// Ambil input dari form
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$nik = filter_var($_POST['nik'], FILTER_SANITIZE_STRING);
$nama_lengkap = filter_var($_POST['nama_lengkap'], FILTER_SANITIZE_STRING);
$tempat_tinggal = filter_var($_POST['tempat_tinggal'], FILTER_SANITIZE_STRING);
$no_telp = filter_var($_POST['no_telp'], FILTER_SANITIZE_STRING);
$penyandang_disabilitas = $_POST['penyandang_disabilitas'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pekerjaan = filter_var($_POST['pekerjaan'], FILTER_SANITIZE_STRING);
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_STRING);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validasi input
if ($password !== $confirm_password) {
    die("Password dan konfirmasi password tidak cocok!");
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Set role_id default
$role_id = 2; // Default untuk user biasa

// Query untuk menyimpan data
$query = "INSERT INTO Users (email, username, nik, nama_lengkap, tempat_tinggal, no_telp, penyandang_disabilitas, jenis_kelamin, pekerjaan, tanggal_lahir, alamat, password, role_id) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssssssssssi", $email, $username, $nik, $nama_lengkap, $tempat_tinggal, $no_telp, $penyandang_disabilitas, $jenis_kelamin, $pekerjaan, $tanggal_lahir, $alamat, $hashedPassword, $role_id);

if ($stmt->execute()) {
    echo "Registrasi berhasil! <a href='../loginMultiuser/login.php'>Login di sini</a>";
} else {
    echo "Registrasi gagal: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
