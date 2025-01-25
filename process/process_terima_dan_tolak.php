<?php
// Koneksi ke database
require_once('koneksi.php');

if (isset($_GET['action'])) {
    $id_laporan = isset($_POST['id_laporan']) ? intval($_POST['id_laporan']) : intval($_GET['id']);
    //saat di tolak
    if ($_GET['action'] == 'reject' && isset($_POST['alasan_ditolak'])) {
        $alasan = $conn->real_escape_string($_POST['alasan_ditolak']);
        $sql = "UPDATE post_lapor SET status = 'Ditolak', alasan_ditolak = '$alasan' WHERE id_laporan = $id_laporan";
        $message = "Laporan berhasil ditolak";
    } 
    
    //saat di terima
    elseif ($_GET['action'] == 'accept') {
        $sql = "UPDATE post_lapor SET status = 'Disetujui' WHERE id_laporan = $id_laporan";
        $message = "Laporan berhasil diterima";

     // saat sudah selesai   
    } elseif ($_GET['action'] == 'acceptreport') {
        $sql = "UPDATE post_lapor SET status = 'Selesai' WHERE id_laporan = $id_laporan";
        $message = "Laporan berhasil diselesaikan";

    } elseif ($_GET['action'] == 'delete') {
        $sql = "DELETE FROM post_lapor WHERE id_laporan = $id_laporan";
    $message = "Laporan berhasil dihapus";
    }
     
    else {
        echo "Aksi tidak valid!";
        exit;
    }
    
    if ($conn->query($sql)) {
        echo "<script>
                alert('$message');
                window.location.href='adminLapor';    
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>