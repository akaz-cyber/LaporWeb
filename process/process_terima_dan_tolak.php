<?php
// Koneksi ke database
require_once('koneksi.php');

// untuk di tolak laporan nya
if (isset($_GET['action']) && isset($_POST['id_laporan'])) {
    $id_laporan = $_POST['id_laporan'];
  
    if ($_GET['action'] == 'reject') {
        $alasan = $_POST['alasan_ditolak'];
        $sql = "UPDATE post_lapor SET status = 'Ditolak', alasan_ditolak = '$alasan' WHERE id_laporan = $id_laporan";
        
    }
    if ($conn->query($sql)) {
        echo ' <script>
              alert("Laporan berhasil di tolak");
               window.location.href="adminLapor";    
              </script>
            ';
    }
}
// untuk di terima laporannya
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id_laporan = intval($_GET['id']);
    if ($_GET['action'] == 'accept') {
        $sql = "UPDATE post_lapor SET status = 'Disetujui' WHERE id_laporan = $id_laporan";
    } else {
        echo "Aksi tidak valid!";
        exit;
    }
    if ($conn->query($sql)) {
        if ($_GET['action'] == 'accept') {
            echo '
            <script>
              alert("Laporan berhasil diterima");
              window.location.href="adminLapor";    
            </script>
            ';
        }
    }
    
}
?>