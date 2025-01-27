<?php
session_start();
require_once('koneksi.php');
require_once('helper.php');

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="page/css/cardindex.css">
  <title>Hello, world!</title>
</head>

<body>
  <?php include 'page/component/navbar.php'; ?>


  <!-- Main Content -->
  <main class="container mt-5">
    <!-- Lapor Section -->
    <section class="container my-5">
      <div class="row align-items-center">
        <!-- Kolom untuk gambar -->
        <div class="col-md-6 text-center">
          <img src="/LaporWeb/page/img/Lapor.png" alt="Lapor" class="img-fluid" style="height: 80%;">
        </div>
        <!-- Kolom untuk teks -->
        <div class="col-md-6">
          <h2>Laporan Masalah Anda, Kami Siap Mendengar</h2>
          <p>Sampaikan keluhan atau masalah Anda dengan mudah dan cepat melalui platform kami.</p>
          <a href="/LaporWeb/login" class="btn btn-danger btn-lg">LAPOR</a>

        </div>
      </div>
    </section>


    <!-- Berita dan Informasi Section -->
    <section class="mb-5">
      <h3 class="text-center mb-4">Berita dan Informasi</h3>

      <div class="row">

        <div class="col-md-4">
          <div class="card">
            <img src="/LaporWeb/page/img/eminem.jpg" class="card-img-top" alt="Berita 1">
            <div class="card-body">
              <h5 class="card-title">Kasus Suap inisial AY</h5>
              <p class="card-text">Pemberian uang auntuk mempengaruhi keputusan seseorang yang memiliki kuasa.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/LaporWeb/page/img/portal-berita.jpg" class="card-img-top" alt="Berita 2">
            <div class="card-body">
              <h5 class="card-title">Penyebaran Informasi di Internet</h5>
              <p class="card-text">Berita yang menyebar dengan sangat cepat di internet, seringkali melalui media sosial.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/LaporWeb/page/img/desa.jpg" class="card-img-top" alt="Berita 3">
            <div class="card-body">
              <h5 class="card-title">Penyebab Banjir </h5>
              <p class="card-text">Kondisi di mana air sungai meluap hingga menggenangi daerah di sekitarnya.</p>
            </div>
          </div>
        </div>
      </div>


      <div class="text-center mt-4">
        <button class="btn btn-outline-danger">Selengkapnya</button>
      </div>
    </section>

    <!-- Laporan Teratas Section -->
    <section class="text-center">
      <h3>Laporan Teratas</h3>
      <div id="topReportsCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="d-flex justify-content-center">
              <img src="/LaporWeb/page/img/profile.png" alt="User" class="rounded-circle" style="height: 80px;">
            </div>
            <h5 class="mt-3">John Doe</h5>
            <p>Saya ingin melaporkan kondisi jalan Baleendah yang sangat memprihatinkan. Jalan tersebut mengalami kerusakan parah, terutama pada bagian tengah jalan yang terdapat lubang-lubang besar dan dalam. Kondisi ini sangat membahayakan pengguna jalan, terutama pengendara sepeda motor. Saya harap pihak terkait dapat segera melakukan perbaikan jalan ini agar tidak menimbulkan kecelakaan lalu lintas. Terlampir foto kondisi jalan saat ini.".</p>
          </div>
          <div class="carousel-item">
            <div class="d-flex justify-content-center">
              <img src="/LaporWeb/page/img/profile.png" alt="User" class="rounded-circle" style="height: 80px;">
            </div>
            <h5 class="mt-3">Jane Smith</h5>
            <p>Saya ingin melaporkan adanya bangunan liar yang didirikan di lahan kosong di samping rumah saya, tepatnya di [alamat lengkap]. Bangunan tersebut mulai dibangun pada tanggal [tanggal] dan terus bertambah luas hingga saat ini. Keberadaan bangunan liar ini sangat mengganggu kenyamanan dan keamanan lingkungan sekitar karena menghalangi akses jalan umum.</p>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#topReportsCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#topReportsCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
  </main>
  
  <?php include 'page/component/footer.php'; ?>
</body>

</html>