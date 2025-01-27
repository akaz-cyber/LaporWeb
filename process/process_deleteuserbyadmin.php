<?php
// Koneksi ke database
require_once 'koneksi.php'; // Sesuaikan dengan file koneksi database Anda

// Mengecek apakah parameter id_user ada
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Query untuk menghapus data terkait di tabel post_lapor
    $sqlDeletePosts = "DELETE FROM post_lapor WHERE id_user = ?";
    if ($stmt = $conn->prepare($sqlDeletePosts)) {
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $stmt->close();
    }

    // Query untuk menghapus pengguna di tabel users
    $sqlDeleteUser = "DELETE FROM users WHERE id_user = ?";
    if ($stmt = $conn->prepare($sqlDeleteUser)) {
        $stmt->bind_param("i", $id_user);
        if ($stmt->execute()) {
            // Menampilkan alert jika berhasil menghapus pengguna
            echo "<script>
                    alert('Pengguna berhasil dihapus!');
                    window.location.href = 'kelolauser'; // Mengalihkan setelah alert
                  </script>";
            exit(); // Hentikan eksekusi setelah pengalihan
        } else {
            echo "Gagal menghapus data pengguna.";
        }
        $stmt->close();
    } else {
        echo "Query penghapusan pengguna tidak valid.";
    }
    $conn->close();
} else {
    echo "ID pengguna tidak ditemukan.";
}
?>
