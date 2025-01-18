<?php
session_start();

// Cek apakah user sudah login dan apakah memiliki role 'Admin'
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '1') {
    header("Location:login");
    exit;
}

// Ambil username dari session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Selamat Datang, Admin <?php echo htmlspecialchars($username); ?>!</h1>
    <a href="logout">Logout</a> <br> <br>
    <a href="adminLapor">Lapor</a>
</body>
</html>
