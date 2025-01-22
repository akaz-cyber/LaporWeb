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


<!DOCTYPE html>
<html lang="en">

<?php include 'Admin/componen/adminHeader.php'; ?>

<body>
    <div class="d-flex vh-100">

        <?php include 'Admin/componen/adminSidebar.php'; ?>

        <div class="main-content w-100">
    <div class="container-fluid p-4">
        <h4>Dashboard</h4>

        <div class="card mt-3 mx-auto " style="max-width: 600px;" >
            <div class="card-header bg-danger text-white text-center fw-bold rounded">
                Selamat datang di halaman  <?php echo htmlspecialchars($username); ?>
            </div>
        </div>

        <div class="row mt-4 g-3">
            <div class="col-md-6">
                <div class="card text-center shadow-sm">
                    <div class="card-body"><a href="kelolauser">
                        <h5 class="card-title">Pengguna</h5>
                        <p class="display-4 fw-bold">100</p>
                        <img src="/LaporWeb/page/img/pengguna.png" class="img-fluid" style="max-height: 80px;" alt="Pengguna Icon">
                        </a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center shadow-sm">
                    <div class="card-body"> <a href="adminLapor">
                        <h5 class="card-title">Laporan</h5>
                        <p class="display-4 fw-bold">200</p>
                         <img src="/LaporWeb/page/img/logolaporan.png" class="img-fluid" style="max-height: 80px;" alt="Laporan Icon">
                         </a></div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>