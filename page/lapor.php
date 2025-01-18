<?php
session_start();
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != '2') {
    header("Location:../loginMultiuser/login.php");
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


<form method="POST" action="../process/process_lapor_user.php">
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


<?php
require_once('../koneksi.php');

$id_user = $_SESSION['id_user'];


$sql = "SELECT * FROM post_lapor WHERE id_user = $id_user";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "Judul: " . $row['judul_laporan'] . "<br>";
    echo "Isi: " . $row['isi_laporan'] . "<br>";
    echo "Status: " . $row['status'] . "<br><hr>";
}
?>

  </div>

  

</body>
</html>
