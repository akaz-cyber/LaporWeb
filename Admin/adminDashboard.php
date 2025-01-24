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
    <div class="d-flex vh-100">
        <?php include 'Admin/componen/adminSidebar.php'; ?>

        <div class="main-content w-100">
            <div class="container-fluid p-4">
                <h4>Dashboard</h4>

                <div class="mt-3">
                    <div class="container">
                        <div class="card-header bg-danger p-md-4 text-white d-flex justify-content-between align-items-center rounded-pill">
                            <h1>Selamat datang di halaman admin</h1>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <!-- Card Pengguna -->
                            <div class="col-sm-8 col-md-6 col-lg-4 mb-4">
                                <div class="card shadow">
                                    <div class="card-custom text-center">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="text-start">
                                                    <h1>Pengguna</h1>
                                                    <h2><?php echo $totalPengguna; ?></h2>
                                                </div>
                                                <div class="card-icon mb-3">
                                                    <i class="fa fa-user fa-3x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Laporan -->
                            <div class="col-sm-8 col-md-6 col-lg-4 mb-4">
                                <div class="card shadow">
                                    <div class="card-custom text-center">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="text-start">
                                                    <h1>Laporan</h1>
                                                    <h2><?php echo $totalLaporan; ?></h2>
                                                </div>
                                                <div class="card-icon mb-3">
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
    </div>

</body>

</html>