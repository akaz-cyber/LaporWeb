<?php
session_start();

// Cek apakah user sudah login dan memiliki role 'Admin'
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '1') {
    http_response_code(404); 
    require 'page/404.php'; 
    exit();
}

require_once('koneksi.php');

// Menentukan jumlah data per halaman
$limit = 5;

// Menentukan halaman yang sedang diakses
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Mengambil laporan dengan status Pending, Disetujui, Selesai, Ditolak dengan pagination
$sql = "SELECT post_lapor.*, users.username 
        FROM post_lapor
        JOIN users ON post_lapor.id_user = users.id_user
        WHERE post_lapor.status IN ('Pending', 'Disetujui', 'Selesai', 'Ditolak')
        ORDER BY post_lapor.id_laporan DESC LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

// Menghitung total jumlah data
$sql_total = "SELECT COUNT(*) AS total FROM post_lapor WHERE status IN ('Pending', 'Disetujui', 'Selesai', 'Ditolak')";
$result_total = $conn->query($sql_total);
$total_row = $result_total->fetch_assoc();
$total_pages = ceil($total_row['total'] / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'Admin/componen/adminHeader.php'; ?>

<body>
    <div class="d-flex vh-100">
        <!-- Sidebar -->
        <?php include 'Admin/componen/adminSidebar.php'; ?>
        <!-- Main Content -->
        <div class="container mt-5">
            <h1>Kelola Laporan</h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelapor</th>
                        <th>Judul Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Tanggal kejadian</th>
                        <th>Lokasi kejadian</th>
                        <th>instansi tujuan</th>
                        <th>kategori laporan</th>
                        <th>Laporan dibuat</th>
                        <th>info pesan di tolak</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menghitung nomor urut berdasarkan halaman
                    $no = $offset + 1;
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++; ?></td> <!-- Menampilkan nomor urut -->
                            <td><?= htmlspecialchars($row['username']); ?></td>
                            <td><?= htmlspecialchars($row['judul_laporan']); ?></td>
                            <td><?= htmlspecialchars($row['isi_laporan']); ?></td>
                            <td><?= htmlspecialchars($row['tanggal_kejadian']); ?></td>
                            <td><?= htmlspecialchars($row['lokasi_kejadian']); ?></td>
                            <td><?= htmlspecialchars($row['instansi_tujuan']); ?></td>
                            <td><?= htmlspecialchars($row['kategori_laporan']); ?></td>
                            <td><?= htmlspecialchars($row['dibuat_kapan']); ?></td>
                            <td>
                                <?php if ($row['status'] == 'Ditolak') { ?>
                                    <!-- Button untuk Lihat Pesan -->
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatPesanModal<?= $row['id_laporan']; ?>">Lihat Pesan</button>
                                <?php } ?>
                            </td>
                            <td><?= htmlspecialchars($row['status']); ?></td>
                            <td>
                                <?php if ($row['status'] == 'Pending') { ?>
                                    <a href="process_terima_dan_tolak?action=accept&id=<?= $row['id_laporan']; ?>" class="btn btn-success">Terima</a>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal"
                                        onclick="setRejectId(<?= $row['id_laporan']; ?>)">Tolak</button>
                                <?php } elseif ($row['status'] == 'Disetujui') { ?>
                                    <a href="process_terima_dan_tolak?action=acceptreport&id=<?= $row['id_laporan']; ?>" class="btn btn-success">Selesaikan</a>
                                <?php } else { ?>
                                    <a href="process_terima_dan_tolak?action=delete&id=<?= $row['id_laporan']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">Hapus laporan</a>
                                <?php } ?>
                            </td>
                        </tr>

                        <!-- Modal Lihat Pesan -->
                        <?php if ($row['status'] == 'Ditolak') { ?>
                            <div class="modal fade" id="lihatPesanModal<?= $row['id_laporan']; ?>" tabindex="-1" aria-labelledby="lihatPesanModalLabel<?= $row['id_laporan']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="lihatPesanModalLabel<?= $row['id_laporan']; ?>">Pesan Penolakan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Tampilkan pesan penolakan -->
                                            <?= htmlspecialchars($row['alasan_ditolak']); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </tbody>

            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?= $page >= $total_pages ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

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

    </div>

    <script>
        function setRejectId(id) {
            document.getElementById('id_laporan').value = id;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>