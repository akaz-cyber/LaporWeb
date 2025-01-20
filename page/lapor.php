<?php
require_once('koneksi.php');
require_once('helper.php');

session_start();
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '2') {
  header("Location:login");
  exit;
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <?php include 'component/navbar.php'; ?>
  <div class="container">

    <h1>Selamat Datang, di lapor <?php echo $_SESSION['username']; ?>!</h1>


    <form method="POST" action="process_lapor_user">
      <label>Jenis Pengaduan:</label><br>
      <select name="jenis_laporan" required>
        <option value="Pengaduan">Pengaduan</option>
        <option value="aspirasi">aspirasi</option>
        <option value="permintaan_aspirasi">permintaan aspirasi</option>
      </select><br><br>

      <label>Judul Laporan:</label><br>
      <input type="text" name="judul_laporan" required><br>
      <label>Isi Laporan:</label><br>
      <textarea name="isi_laporan" required></textarea><br>
      <label>Tanggal Kejadian:</label><br>
      <input type="date" name="tanggal_kejadian" required><br>
      <label>Lokasi Kejadian:</label><br>
      <input type="text" name="lokasi_kejadian" required><br>
      <label>Instansi Tujuan:</label><br>
      <input type="text" name="instansi_tujuan" required><br>
      <label>Kategori Laporan:</label><br>
      <input type="text" name="kategori_laporan" required><br>


      <button type="submit">Tambah Laporan</button>
    </form>

    <div class="container mt-3">
      <h2>Filter Laporan</h2>
      <div class="d-flex mb-3">
        <a href="?filter=all" class="btn <?php echo ($filter == 'all') ? 'btn-primary' : 'btn-light'; ?> me-2">Semua Laporan</a>
        <a href="?filter=my" class="btn <?php echo ($filter == 'my') ? 'btn-primary' : 'btn-light'; ?>">Laporan Saya</a>
      </div>
    </div>

    <?php
    require_once('koneksi.php');
    $id_user = $_SESSION['id_user'];
    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
    if ($filter == 'my') {
      // Menampilkan laporan milik user yang statusnya Pending atau Ditolak, diurutkan dari yang terbaru
      $sql = "SELECT * FROM post_lapor 
        WHERE id_user = $id_user 
        AND (status = 'Pending' OR status = 'Ditolak' OR status = 'Disetujui' OR status = 'Selesai') 
        ORDER BY id_laporan DESC";
    } else {
      // Menampilkan semua laporan dengan status Disetujui, diurutkan dari yang terbaru
      $sql = "SELECT * FROM post_lapor 
            WHERE status = 'Disetujui' OR status = 'Selesai'
            ORDER BY id_laporan DESC";
    }


    $result = $conn->query($sql);

    ?>


    <div class="container">
      <h3>Daftar Laporan</h3>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='card mb-3'>";
          echo "<div class='card-body'>";
          echo "<h5 class='card-title'>" . htmlspecialchars($row['judul_laporan']) . "</h5>";
          echo "<p class='card-text'>" . nl2br(htmlspecialchars($row['isi_laporan'])) . "</p>";
          echo "<p class='text-muted'>Status: " . $row['status'] . "</p>";
          echo "<p class='text-muted'>Tanggal dibuat: " . date('d M Y', strtotime($row['dibuat_kapan'])) . "</p>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<p>Tidak ada laporan untuk ditampilkan.</p>";
      }
      ?>
    </div>


  </div>



</body>

</html>