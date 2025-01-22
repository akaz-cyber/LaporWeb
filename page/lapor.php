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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .form-container {
      background-color: #ff4d4d;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      margin: 0 auto;
    }

    .form-header {
      background-color: rgb(249, 129, 89);
      color: white;
      text-align: center;
      padding: 10px;
      border-radius: 10px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .btn-group .btn {
      border-radius: 20px;
      font-size: 0.9rem;
    }

    .btn-active {
      background-color: #ffc107;
      color: black;
    }

    .form-control {
      border-radius: 5px;
      margin-bottom: 15px;
    }

    .btn-submit {
      background-color: orange;
      color: white;
      border: none;
      font-weight: bold;
      width: 100%;
    }

    .btn-submit:hover {
      background-color: #e69500;
    }

    .form-title {
      text-align: center;
      margin-bottom: 10px;
    }


    /* laporan saya */
    .card {
      border-radius: 10px;
      border: 2px solid #e0e0e0;
      margin-bottom: 1rem;
    }

    .card-header {
      font-weight: bold;
      width: 80%;
    }

    .status-pending {
      color: orange;
    }

    .status-accepted {
      color: green;
    }

    .status-rejected {
      color: red;
    }

    .btn-edit {
      background-color: #007bff;
      color: white;
    }

    .btn-delete {
      background-color: #dc3545;
      color: white;
    }

    .rounded-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #ccc;
      margin-right: 1rem;
    }

    .message-box {
      background-color: #f8f9fa;
      padding: 1rem;
      border-radius: 10px;
      color: #6c757d;
    }

    .btn-active {
        background-color: yellow;
        color: black;
    }

    .btn-light {
        background-color: white;
        color: black;
    }
    
  </style>
</head>

<body>
  <?php include 'component/navbar.php'; ?>
  <div class="container py-5">

    <h1 class="text-center mb-4">Selamat Datang, di lapor <?php echo $_SESSION['username']; ?>!</h1>

    <div class="form-container">
      <div class="form-header">Sampaikan Laporan Keluh Kesah Anda Sekarang!</div>

      <form method="POST" action="process_lapor_user">
        <div class="mb-4">
          <label class="form-label">Pilih Jenis Laporan*</label>
          <div class="btn-group w-100" role="group">
            <button type="button" class="btn btn-light" onclick="setJenisLaporan(this, 'Pengaduan')">Pengaduan</button>
            <button type="button" class="btn btn-light" onclick="setJenisLaporan(this, 'Aspirasi')">Aspirasi</button>
            <button type="button" class="btn btn-light" onclick="setJenisLaporan(this, 'Permintaan Informasi')">Permintaan Informasi</button>
          </div>
          <input type="hidden" name="jenis_laporan" id="jenis_laporan" value="Pengaduan" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Judul Laporan*</label>
          <input type="text" class="form-control" name="judul_laporan" placeholder="Judul Laporan Anda" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Isi Laporan*</label>
          <textarea class="form-control" name="isi_laporan" rows="4" placeholder="Ketik isi laporan Anda" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Kejadian*</label>
          <input type="date" class="form-control" name="tanggal_kejadian" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Lokasi Kejadian*</label>
          <input type="text" class="form-control" name="lokasi_kejadian" placeholder="Lokasi Kejadian" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Instansi Tujuan*</label>
          <input type="text" class="form-control" name="instansi_tujuan" placeholder="Instansi Tujuan" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Kategori Laporan*</label>
          <input type="text" class="form-control" name="kategori_laporan" placeholder="Kategori Laporan" required>
        </div>

        <button type="submit" class="btn btn-submit">LAPOR!</button>
      </form>
    </div>
  </div>

  <div class="container mt-3">
      <h2>Filter Laporan</h2>
      <div class="d-flex mb-3">
        <a href="?filter=all" class="btn <?php echo ($filter == 'all') ? 'btn-primary' : 'btn-light'; ?> me-2">Semua Laporan</a>
        <a href="?filter=my" class="btn <?php echo ($filter == 'my') ? 'btn-primary' : 'btn-light'; ?>">Laporan Saya</a>
      </div>
    </div>



  <?php require_once('koneksi.php');
  $id_user = $_SESSION['id_user'];
  $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
  if ($filter == 'my') {
    $sql = "SELECT post_lapor.*, users.username FROM post_lapor JOIN users ON post_lapor.id_user = users.id_user WHERE post_lapor.id_user = $id_user AND (post_lapor.status = 'Pending' OR post_lapor.status = 'Ditolak' OR post_lapor.status = 'Disetujui' OR post_lapor.status = 'Selesai') ORDER BY post_lapor.id_laporan DESC";
  } else {
    $sql = "SELECT post_lapor.*, users.username FROM post_lapor JOIN users ON post_lapor.id_user = users.id_user WHERE post_lapor.status = 'Disetujui' OR post_lapor.status = 'Selesai' ORDER BY post_lapor.id_laporan DESC";
  }
  $result = $conn->query($sql); ?>


  <div class="container">
    <h3>Daftar Laporan</h3>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-header fw-bold'>" . htmlspecialchars($row['username']) . "</div>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'> judul laporan :" . htmlspecialchars($row['judul_laporan']) . " | " . $row['status'] . "</h5>";
        echo "<p class='card-text'> kategori :" . nl2br(htmlspecialchars($row['kategori_laporan'])) . "</p>";
        echo "<p class='card-text'> Instansi_tujuan :" . nl2br(htmlspecialchars($row['instansi_tujuan'])) . "</p>";
        echo "<p class='card-text'> isi laporan :" . nl2br(htmlspecialchars($row['isi_laporan'])) . "</p>";
        echo "<p class='card-text'> status :" . nl2br(htmlspecialchars($row['status'])) . "</p>";
        echo "<p class='card-text'> isi laporan :" . nl2br(htmlspecialchars($row['jenis_laporan'])) . "</p>";
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
  <script>
    function setJenisLaporan(button, value) {
        // Atur semua tombol kembali ke kelas "btn-light"
        document.querySelectorAll('.btn-group .btn').forEach(btn => {
            btn.classList.remove('btn-active');
            btn.classList.add('btn-light');
        });

        // Tambahkan kelas "btn-active" pada tombol yang diklik
        button.classList.remove('btn-light');
        button.classList.add('btn-active');

        // Set nilai input tersembunyi
        document.getElementById('jenis_laporan').value = value;
    }
  </script>
  <?php include 'page/component/footer.php'; ?>
</body>

</html>