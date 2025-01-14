<?php
require_once('../koneksi.php');

// Ambil input dari form
$email = $_POST['email'];
$password = md5($_POST['password']); 

// Query untuk memeriksa user berdasarkan email dan password
$query = "SELECT * FROM Users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);



// Mengecek pengguna
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    session_start();
    $_SESSION['id_user'] = $row["id_user"];
    $_SESSION['role_id'] = $row["role_id"];

    // Redirect berdasarkan role
    if ($row['role_id'] == '1') {
        echo "Ini halaman admin";
        header("Location:../Admin/adminDashboard.php");
        exit();
    } elseif ($row['role_id'] == '2') {
        echo "Ini halaman admin";
        header("Location:../page/lapor.php");
        exit();
    }
} else {
    echo "Email atau password salah!";
}

// Tutup koneksi
mysqli_close($conn);
?>
