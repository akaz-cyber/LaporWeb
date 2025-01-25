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

  <link rel="stylesheet" href="/LaporWeb/page/css/lapor.css">

  <title>Halaman lapor</title>
</head>

<body>
  <?php include 'component/navbar.php'; ?>
  <div class="container py-5">
    <div class="text-center  mb-4">
      <h1 class="text-h1-r"><b>Layanan Aspirasi dan Pengaduan Online Rakyat</b>
        <p>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</p>
      </h1>
    </div>

    <div class="border-bd mx-auto mb-4"></div>

    <div class="form-container">
      <div class="form-header">Sampaikan Laporan Keluh Kesah Anda Sekarang!</div>

      <form method="POST" action="process_lapor_user">
        <div class="mb-4">
          <label class="form-label text-light">Pilih Jenis Laporan*</label>
          <div class="btn-group w-100" role="group">
            <button type="button" class="btn btn-light" onclick="setJenisLaporan(this, 'Pengaduan')">Pengaduan</button>
            <button type="button" class="btn btn-light" onclick="setJenisLaporan(this, 'Aspirasi')">Aspirasi</button>
            <button type="button" class="btn btn-light" onclick="setJenisLaporan(this, 'Permintaan Informasi')">Permintaan Informasi</button>
          </div>

          <input type="hidden" name="jenis_laporan" id="jenis_laporan" value="Pengaduan" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-light">Judul Laporan*</label>
          <input type="text" class="form-control" name="judul_laporan" placeholder="Judul Laporan Anda" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-light">Isi Laporan*</label>
          <textarea class="form-control" name="isi_laporan" rows="4" placeholder="Ketik isi laporan Anda" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label text-light">Tanggal Kejadian*</label>
          <input type="date" class="form-control" name="tanggal_kejadian" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-light">Lokasi Kejadian*</label>
          <input type="text" class="form-control" name="lokasi_kejadian" placeholder="Lokasi Kejadian" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-light">Instansi Tujuan*</label>
          <input type="text" class="form-control" name="instansi_tujuan" placeholder="Instansi Tujuan" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-light">Kategori Laporan*</label>
          <input type="text" class="form-control" name="kategori_laporan" placeholder="Kategori Laporan" required>
        </div>

        <button type="submit" class="btn btn-submit">LAPOR!</button>
      </form>
    </div>
  </div>

  <div class="container mt-3">
    <?php
    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
    ?>
    <div class="nav-filter d-flex mb-3">
      <a href="?filter=all" class="<?php echo ($filter == 'all') ? 'active' : ''; ?> fw-bold me-3">Semua Laporan</a>
      <a href="?filter=my" class="<?php echo ($filter == 'my') ? 'active' : ''; ?> fw-bold">Laporan Saya</a>
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
    <?php if ($result->num_rows > 0): ?>
      <?php foreach ($result as $row): ?>
        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <img class="rounded-avatar" src="/LaporWeb/page/img/profile.png" alt="">
              <h5 class="ms-3 mb-0"><?= htmlspecialchars($row['username']) ?></h5>
            </div>
            <div class="mt-3">
              <h5 class="text-primary">Judul Laporan: <?= htmlspecialchars($row['judul_laporan']) ?> - <span class=""><?= htmlspecialchars($row['lokasi_kejadian']) ?></span></h5>
              <p class="text-muted"> <?= date('d M Y', strtotime($row['dibuat_kapan'])) ?> - <span class="status-<?= strtolower($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></span></p>
              <p><strong>Kategori:</strong> <?= htmlspecialchars($row['kategori_laporan']) ?></p>
              <p><strong>Instansi Tujuan:</strong> <?= htmlspecialchars($row['instansi_tujuan']) ?></p>
              <p><strong>Jenis Laporan:</strong> <?= htmlspecialchars($row['jenis_laporan']) ?></p>
              <p><strong>Isi Laporan:</strong> <?= nl2br(htmlspecialchars($row['isi_laporan'])) ?></p>
            </div>
            <?php if (strtolower($row['status']) === 'ditolak'): ?>
              <p class="fw-bold">Pesan kenapa di tolak : </p>
              <div class="message-box mt-3">
                <p><?= htmlspecialchars($row['alasan_ditolak']) ?></p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>


  </div>
  <script>
    // Fungsi untuk menetapkan tombol aktif
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

    // Pastikan tombol "Pengaduan" aktif secara default saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
      const defaultButton = document.querySelector('.btn-group .btn:first-child');
      if (defaultButton) {
        setJenisLaporan(defaultButton, 'Pengaduan');
      }
    });
  </script>

  <?php include 'page/component/footer.php'; ?>
</body>

</html>