<?php
session_start();

// Cek apakah user sudah login dan apakah memiliki role 'Admin'
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '1') {
    header("Location: ../loginMultiuser/login.php");
    exit;
}
?>

<a href="adminDashboard.php">beranda</a> <br> <br>


<?php
// Koneksi ke database
require_once('../koneksi.php');
$id_user = $_SESSION['id_user'];

// Ambil laporan dengan status Pending
$sql = "SELECT * FROM post_lapor WHERE status = 'Pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Laporan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Kelola Laporan</h1>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['judul_laporan']; ?></h5>
                    <p class="card-text"><?php echo $row['isi_laporan']; ?></p>
                    <a href="../process/process_terima_dan_tolak.php?action=accept&id=<?php echo $row['id_laporan']; ?>" class="btn btn-success">Terima</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal"
                        onclick="setRejectId(<?php echo $row['id_laporan']; ?>)">Tolak</button>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Modal untuk tolak -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="../process/process_terima_dan_tolak.php?action=reject">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModalLabel">Alasan Penolakan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_laporan" name="id_laporan">
                        <div class="mb-3">
                            <label for="alasan_ditolak" class="form-label">Masukkan alasan penolakan:</label>
                            <textarea class="form-control" id="alasan_ditolak" name="alasan_ditolak" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set ID Laporan di modal
        function setRejectId(id) {
            document.getElementById('id_laporan').value = id;
        }
    </script>
</body>

</html>