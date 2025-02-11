<?php

require_once('koneksi.php');

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
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

//validasi jika kosong
if (
    empty($email) || empty($username) || empty($nik) || empty($nama_lengkap) || empty($tempat_tinggal) || 
    empty($no_telp) || empty($penyandang_disabilitas) || empty($jenis_kelamin) || empty($pekerjaan) || 
    empty($tanggal_lahir) || empty($password) || empty($confirm_password)
) {
    echo "<script>
              alert('Tolong isi terlebih dahulu');
              window.location.href='register';    
          </script>";
    exit();
}





// Validasi input password
if ($password !== $confirm_password) {
    echo "<script>
              alert('Password dan konfirmasi password tidak cocok!');
              window.location.href='register';    
          </script>";
    exit();
} elseif (strlen($password) < 5) {
    echo "<script>
              alert('Kata sandi harus terdiri dari 5 karakter.');
              window.location.href='register';    
          </script>"; 
    exit();
} elseif (strlen($nik) <= 15) {
    echo "<script>
              alert('Maaf Nik tidak valid');
              window.location.href='register';    
          </script>"; 
    exit();
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Set role_id default
$role_id = 2; // Default untuk user biasa

// Periksa apakah email sudah ada
$emailCheckQuery = "SELECT email FROM Users WHERE email = ?";
$emailCheckStmt = $conn->prepare($emailCheckQuery);
$emailCheckStmt->bind_param("s", $email);
$emailCheckStmt->execute();
$emailCheckStmt->store_result();

if ($emailCheckStmt->num_rows > 0) {
    echo "<script>
              alert('Email sudah terdaftar!');
              window.location.href='register';    
          </script>";
    $emailCheckStmt->close();
    $conn->close();
    exit();
}

// Jika email belum terdaftar, lanjutkan dengan menyimpan data
$query = "INSERT INTO Users (email, username, nik, nama_lengkap, tempat_tinggal, no_telp, penyandang_disabilitas, jenis_kelamin, pekerjaan, tanggal_lahir, password, role_id) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssssssssssi", $email, $username, $nik, $nama_lengkap, $tempat_tinggal, $no_telp, $penyandang_disabilitas, $jenis_kelamin, $pekerjaan, $tanggal_lahir, $hashedPassword, $role_id);

if ($stmt->execute()) {
    echo "<script>
              alert('Registrasi berhasil!');
              window.location.href='login';    
          </script>";
} else {
    echo "<script>
              alert('Registrasi gagal: " . addslashes($stmt->error) . "');
              window.location.href='register';    
          </script>";
}

// Tutup koneksi
$emailCheckStmt->close();
$stmt->close();
$conn->close();
?>
