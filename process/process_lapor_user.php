<?php
// Koneksi ke database
require_once('koneksi.php');

// mengambil session user yang sudah login 
session_start();
$id_user = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul_laporan = $_POST['judul_laporan'];
    $isi_laporan = $_POST['isi_laporan'];
    $tanggal_kejadian = $_POST['tanggal_kejadian'];
    $jenis_laporan = $_POST['jenis_laporan'];
    $lokasi_kejadian = $_POST['lokasi_kejadian'];
    $instansi_tujuan = $_POST['instansi_tujuan'];
    $kategori_laporan = $_POST['kategori_laporan'];

    // Tambahkan laporan ke database
    $sql = "INSERT INTO post_lapor (judul_laporan, isi_laporan, tanggal_kejadian, jenis_laporan, lokasi_kejadian, instansi_tujuan, kategori_laporan, status, id_user)
            VALUES ('$judul_laporan', '$isi_laporan', '$tanggal_kejadian', '$jenis_laporan', '$lokasi_kejadian', '$instansi_tujuan', '$kategori_laporan', 'Pending', $id_user)";
    $conn->query($sql);

    echo'
    <script>
      alert("Laporan berhasil ditambahkan");
       window.location.href="lapor";    
      </script>
    ';
} else {
    
    echo'
    <script>
      alert("gagal menambahkan laporan");
       window.location.href="lapor";    
      </script>
    ';
}
?>