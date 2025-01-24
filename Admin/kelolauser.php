<?php




session_start();

if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '1') {
    http_response_code(404); 
    require 'page/404.php'; 
    exit();
}

// Cek apakah user sudah login dan apakah memiliki role 'Admin'
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '1') {
    http_response_code(404); 
    require 'page/404.php'; 
    exit();
}

// Memanggil file get_users.php untuk mengambil data users
$users = require_once('process/process_getuser.php');

// Pagination logic
$limit = 5; // Jumlah data per halaman
$totalUsers = count($users);
$totalPages = ceil($totalUsers / $limit);

// Ambil halaman saat ini dari query string, default ke halaman 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = ($page > 0) ? $page : 1;

// Hitung offset untuk query
$offset = ($page - 1) * $limit;

// Ambil data untuk halaman saat ini
$usersToShow = array_slice($users, $offset, $limit);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'Admin/componen/adminHeader.php'; ?>

<body>
    <div class="d-flex vh-100">
        <!-- Sidebar -->
        <?php include 'Admin/componen/adminSidebar.php'; ?>
        <!-- Main Content -->
        <div class="main-content w-100">
            <div class="container-fluid p-3">
                <!-- Header -->
                <h4>Dashboard</h4>
                <div class="card mt-3">
                    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                        <span>Kelola Data Users</span>
                        <!-- Button to trigger modal -->
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Tempat Tinggal saat ini</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Penyandang Disabilitas</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Menampilkan data users sesuai dengan halaman yang dipilih
                                if (count($usersToShow) > 0) {
                                    $no = $offset + 1; // Mulai nomor urut dari offset
                                    foreach ($usersToShow as $user) {
                                        // Menentukan hak akses berdasarkan role_id
                                        $role = ($user['role_id'] == 1) ? 'Admin' : 'User';
                                        echo "<tr>";
                                        echo "<td>$no</td>";
                                        echo "<td>{$user['username']}</td>";
                                        echo "<td>{$user['nama_lengkap']}</td>";
                                        echo "<td>{$user['email']}</td>";
                                        echo "<td>{$user['tempat_tinggal']}</td>";
                                        echo "<td>{$user['no_telp']}</td>";
                                        echo "<td>{$user['dibuat_kapan']}</td>";
                                        echo "<td>{$user['tanggal_lahir']}</td>";
                                        echo "<td>{$user['penyandang_disabilitas']}</td>";
                                        echo "<td>{$user['alamat']}</td>";
                                        echo "<td>
                                                <button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editUserModal' data-id='{$user['id_user']}'>Edit</button>
                                                <button class='btn btn-danger btn-sm' data-id='{$user['id_user']}' onclick='confirmDelete({$user['id_user']})'>Hapus</button>
                                              </td>";
                                        echo "</tr>";
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td colspan='11'>Tidak ada data user</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-start mt-3">
                            <nav aria-label="Page navigation ">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?= $page <= 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?= $page - 1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>

                                    <li class="page-item <?= $page >= $total_pages ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?= $page + 1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah User -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="addUserModalLabel">Tambah Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="tambah_userbyadmin" method="POST">
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik" maxlength="16" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempatTinggal" class="form-label">Tempat Tinggal</label>
                                        <input type="text" class="form-control" id="tempatTinggal" name="tempat_tinggal"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggalLahir" name="tanggal_lahir"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="jenisKelamin" name="jenis_kelamin" required>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="notelp" class="form-label">no Telp</label>
                                        <input type="number" class="form-control" id="noTelp" name="no_telp" required>
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penyandangDisabilitas" class="form-label">Penyandang Disabilitas</label>
                                        <select class="form-select" id="penyandangDisabilitas" name="penyandang_disabilitas"
                                            required>
                                            <option value="">Disabilitas</option>
                                            <option value="ya">Iya</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="confirm_password" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Edit User -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm" action="edit_userbyadmin" method="POST">
                            <!-- Input untuk ID User (Hidden) -->
                            <input type="hidden" id="editUserId" name="id">

                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="editNamaLengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="editNamaLengkap" name="nama_lengkap"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editTempatTinggal" class="form-label">Tempat Tinggal</label>
                                        <input type="text" class="form-control" id="editTempatTinggal" name="tempat_tinggal"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editTanggalLahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="editTanggalLahir" name="tanggal_lahir"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editJenisKelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="editJenisKelamin" name="jenis_kelamin" required>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editNoTelp" class="form-label">No Telp</label>
                                        <input type="text" class="form-control" id="editNoTelp" name="no_telp" required>
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="editEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="editEmail" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="editUsername" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPenyandangDisabilitas" class="form-label">Penyandang
                                            Disabilitas</label>
                                        <select class="form-select" id="editPenyandangDisabilitas"
                                            name="penyandang_disabilitas" required>
                                            <option value="ya">Iya</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPassword" class="form-label">Password (Opsional)</label>
                                        <input type="password" class="form-control" id="editPassword" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">konfirmasi Password (Opsional)</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="/LaporWeb/Admin/componen/js/kelolauser.js"></script>


</body>

</html>