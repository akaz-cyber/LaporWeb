<?php
require_once('../koneksi.php');

// Ambil input dari form
$email = $_POST['email'];
$password = $_POST['password'];

// Query untuk memeriksa user berdasarkan email
$query = "SELECT * FROM Users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Mengecek pengguna
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
  // saya membuat sebuah password sebelum nya menggunakan md5 jadi saya membuat functipn lagi untuk bisa menerima md5 agar terbaca
     if (strlen($row['password']) == 32) {
       
        if (md5($password) === $row['password']) {
            session_start();
            $_SESSION['id_user'] = $row["id_user"];
            $_SESSION['role_id'] = $row["role_id"];
            $_SESSION['username'] = $row["username"];

            // Redirect berdasarkan role
            if ($row['role_id'] == '1') {
                header("Location:../Admin/adminDashboard.php");
                exit();
            } elseif ($row['role_id'] == '2') {
                header("Location:../page/lapor.php");
                exit();
            }
        } else {
            echo '
            <script>
              alert("Password salah");
              window.location.href="../loginMultiuser/login.php";    
            </script>
            ';
        }
    } else {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['id_user'] = $row["id_user"];
            $_SESSION['role_id'] = $row["role_id"];
            $_SESSION['username'] = $row["username"];

            // Redirect berdasarkan role
            if ($row['role_id'] == '1') {
                header("Location:../Admin/adminDashboard.php");
                exit();
            } elseif ($row['role_id'] == '2') {
                header("Location:../page/lapor.php");
                exit();
            }
        } else {
            echo '
            <script>
              alert("Password salah");
              window.location.href="../loginMultiuser/login.php";    
            </script>
            ';
        }
    }
} else {
    echo '
    <script>
      alert("Email tidak ditemukan");
      window.location.href="../loginMultiuser/login.php";    
    </script>
    ';
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
