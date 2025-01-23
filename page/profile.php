<?php
session_start(); // Pastikan session aktif untuk mengambil data pengguna yang sedang login
require_once 'koneksi.php'; // Sesuaikan dengan file koneksi database Anda

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil id_user dari session
$id_user = $_SESSION['id_user'];

// Query untuk mengambil data pengguna berdasarkan id_user
$sql = "SELECT * FROM users WHERE id_user = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data pengguna ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Pengguna tidak ditemukan.";
        exit();
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="page/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?php include 'page/component/navbar.php'; ?>
    <div class="container mt-5">
        <!-- Profile Header -->
        <div class="card p-4 mb-4 shadow-sm">
            <button class="edit-btn" title="Edit" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                <i class="bi bi-pencil-square"></i>
            </button>
            <div class="profile-header">
                <img src="./page/img/pp2.jpeg" alt="Profile" class="profile-img">
                <div class="profile-name">
                    <h3><?= $user['nama_lengkap'] ?></h3>
                    <p><?= $user['pekerjaan'] ?> | <?= $user['tempat_tinggal'] ?></p>
                </div>
            </div>
        </div>

        <!-- Informasi Publik Section -->
        <div class="card p-4 mb-4 shadow-sm">
            <h5 class="card-title border-bottom pb-2">Informasi Publik</h5>
            <div class="data-row">
                <span>Nama Lengkap *</span>
                <span class="separator">:</span>
                <span><?= $user['nama_lengkap'] ?></span>
            </div>
            <div class="data-row">
                <span>Username *</span>
                <span class="separator">:</span>
                <span><?= $user['username'] ?></span>
            </div>
        </div>

        <!-- Data Pribadi Section -->
        <div class="card p-4 shadow-sm">
            <h5 class="card-title border-bottom pb-2">Data Pribadi</h5>
            <div class="data-row">
                <span>Email *</span>
                <span class="separator">:</span>
                <span><?= $user['email'] ?></span>
            </div>
            <div class="data-row">
                <span>No. Handphone *</span>
                <span class="separator">:</span>
                <span><?= $user['no_telp'] ?></span>
            </div>
            <div class="data-row">
                <span>Tanggal Lahir *</span>
                <span class="separator">:</span>
                <span><?= date('d/m/Y', strtotime($user['tanggal_lahir'])) ?></span>
            </div>
            <div class="data-row">
                <span>No. Induk Kependudukan</span>
                <span class="separator">:</span>
                <span><?= $user['nik'] ?></span>
            </div>
            <div class="data-row">
                <span>Jenis Kelamin *</span>
                <span class="separator">:</span>
                <span><?= $user['jenis_kelamin'] ?></span>
            </div>
            <div class="data-row">
                <span>Pekerjaan *</span>
                <span class="separator">:</span>
                <span><?= $user['pekerjaan'] ?></span>
            </div>
            <div class="data-row">
                <span>Penyandang Disabilitas *</span>
                <span class="separator">:</span>
                <span><?= $user['penyandang_disabilitas'] ?></span>
            </div>
            <div class="data-row">
                <span>Tempat Tinggal Saat Ini *</span>
                <span class="separator">:</span>
                <span><?= $user['tempat_tinggal'] ?></span>
            </div>
            <div class="data-row">
                <span>Alamat</span>
                <span class="separator">:</span>
                <span><?= $user['alamat'] ?></span>
            </div>
        </div>

        <!-- Modal Edit Profile -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1>Informasi Public</h1>
                        <form id="editProfileForm" method="POST" action="editprofile">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Nama Lengkap *</label>
                                <input type="text" class="form-control" id="fullName" name="nama_lengkap"
                                    value="<?= $user['nama_lengkap'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username *</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="<?= $user['username'] ?>" required>
                            </div>
                            <br>
                            <h1>Data Pribadi</h1>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= $user['email'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Handphone *</label>
                                <input type="text" class="form-control" id="phone" name="no_telp"
                                    value="<?= $user['no_telp'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="birthDate" class="form-label">Tanggal Lahir *</label>
                                <input type="date" class="form-control" id="birthDate" name="tanggal_lahir"
                                    value="<?= $user['tanggal_lahir'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="birthDate" class="form-label">NIK *</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik'] ?>"
                                    required>

                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin *</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki" <?= ($user['jenis_kelamin'] === 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= ($user['jenis_kelamin'] === 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="occupation" class="form-label">Pekerjaan *</label>
                                <input type="text" class="form-control" id="occupation" name="pekerjaan"
                                    value="<?= $user['pekerjaan'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="penyandang_disabilitas" class="form-label">Penyandang Disabilitas *</label>
                                <select class="form-control" id="penyandang_disabilitas" name="penyandang_disabilitas"
                                    required>
                                    <option value="ya" <?= ($user['penyandang_disabilitas'] === 'ya') ? 'selected' : ''; ?>>Ya</option>
                                    <option value="tidak" <?= ($user['penyandang_disabilitas'] === 'tidak') ? 'selected' : ''; ?>>Tidak</option>
                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Tempat Tinggal Saat ini *</label>
                                <input type="text" class="form-control" id="tempatTinggal" name="tempat_tinggal"
                                    value="<?= $user['tempat_tinggal'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control" id="address" name="alamat"
                                    rows="3"><?= $user['alamat'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'page/component/footer.php'; ?>
</body>

</html>