<?php

session_start();
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '1') {
    header("Location:../loginMultiuser/login.php");
    exit;
}


?>

<h1>Selamat Datang, Admin <?php echo $_SESSION['username']; ?>!</h1>
<a href="../loginMultiuser/logout.php">Logout</a>