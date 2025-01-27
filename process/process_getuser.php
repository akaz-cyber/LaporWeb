<?php
require_once('koneksi.php');

// Ambil data users dari database
$query = "SELECT id_user, username, nama_lengkap, email, tempat_tinggal, no_telp, role_id, dibuat_kapan,nik,pekerjaan, tanggal_lahir, penyandang_disabilitas, jenis_kelamin, alamat FROM users";
$result = $conn->query($query);

// Cek apakah ada data user
if ($result->num_rows > 0) {
    // Menyimpan data users dalam array asosiatif
    $users = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $users = [];
}

// Menutup koneksi setelah pengambilan data
$result->close();
$conn->close();

// Mengembalikan data users
return $users;
?>
