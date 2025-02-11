<?php
session_start();
require_once('koneksi.php');
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '1') {
    http_response_code(404); 
    require 'page/404.php'; 
    exit();
}

$username = $_SESSION['username'];

$sqlPengguna = "SELECT COUNT(*) AS id_user FROM users";
$resultPengguna = $conn->query($sqlPengguna);

$rowPengguna = $resultPengguna->fetch_assoc();
$totalPengguna = $rowPengguna['id_user'];


$sqlLaporan = "SELECT COUNT(*) AS id_laporan FROM post_lapor";
$resultLaporan = $conn->query($sqlLaporan);

$rowLaporan = $resultLaporan->fetch_assoc();
$totalLaporan = $rowLaporan['id_laporan'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
</head>

<?php include 'Admin/componen/adminHeader.php'; ?>

<body>
<div class="d-flex flex-column flex-md-row vh-100">
        <?php include 'Admin/componen/adminSidebar.php'; ?>

        <div class="main-content w-100">
            <div class="container-fluid p-4">
                <h4>Dashboard</h4>
                <div class="mt-3">
                    <div class="container">
                        <div class="card-header bg-danger text-white p-3 p-md-4 text-center text-md-start rounded-pill">
                            <h1 class="h4 mb-0">Selamat datang di halaman admin</h1>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row g-4 justify-content-center">
                            <!-- Card Pengguna -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card shadow card-custom">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="text-start me-auto">
                                                <h5>Pengguna</h5>
                                                <h2 class="fw-bold"><?php echo $totalPengguna; ?></h2>
                                            </div>
                                            <div class="card-icon">
                                                <i class="fa fa-user fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Laporan -->
                              <!-- Card Laporan -->
                              <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card shadow card-custom">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="text-start me-auto">
                                                <h5>Laporan</h5>
                                                <h2 class="fw-bold"><?php echo $totalLaporan; ?></h2>
                                            </div>
                                            <div class="card-icon">
                                                <i class="fa fa-file fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>