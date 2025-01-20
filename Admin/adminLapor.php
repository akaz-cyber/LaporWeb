<?php
session_start();

// Cek apakah user sudah login dan memiliki role 'Admin'
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '1') {
    header("Location: login");
    exit;
}

// Koneksi ke database
require_once('koneksi.php');

// Ambil laporan dengan status Pending
$sql = "SELECT * FROM post_lapor WHERE status IN ('Pending', 'Disetujui', 'Selesai', 'Ditolak')  ORDER BY id_laporan DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Kelola Laporan</h1>
        <a href="adminDashboard" class="btn btn-primary mb-3">Beranda</a>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['judul_laporan']); ?></h5>
                    <p class="card-text"><?= htmlspecialchars($row['isi_laporan']); ?></p>
                    <p class="card-text"><?= htmlspecialchars($row['status']); ?></p>

                    <?php if ($row['status'] == 'Pending') { ?>
                        <a href="process_terima_dan_tolak?action=accept&id=<?= $row['id_laporan']; ?>" class="btn btn-success">Terima</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal"
                            onclick="setRejectId(<?= $row['id_laporan']; ?>)">Tolak</button>
                    <?php } elseif ($row['status'] == 'Disetujui') { ?>
                        <a href="process_terima_dan_tolak?action=acceptreport&id=<?= $row['id_laporan']; ?>" class="btn btn-success">Selesaikan</a>
                    <?php } elseif ($row['status'] && 'Selesai' && 'Ditolak'  ) { ?>
                        <a href="process_terima_dan_tolak?action=delete&id=<?= $row['id_laporan']; ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">Hapus laporan</a>

                    <?php }

                    ?>
                </div>
            </div>
        <?php } ?>

    </div>

    <!-- Modal untuk Tolak -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="process_terima_dan_tolak?action=reject">
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


    <script>
        function setRejectId(id) {
            document.getElementById('id_laporan').value = id;
        }
    </script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>