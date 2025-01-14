<?php
session_start();
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '2') {
    header("Location:../loginMultiuser/login.php");
    exit;
}

?>

<h1>Selamat Datang, di lapor <?php echo $_SESSION['username']; ?>!</h1>
<a href="../loginMultiuser/logout.php">Logout</a>