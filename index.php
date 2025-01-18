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
          <button class="btn btn-danger btn-lg">LAPOR</button>
        </div>
      </div>
    </section>


    <!-- Berita dan Informasi Section -->
    <section class="mb-5">
      <h3 class="text-center mb-4">Berita dan Informasi</h3>

      <div class="row">
        <!-- Gaya tambahan untuk kartu -->
        <style>
          .card {
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
          }

          .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
          }
        </style>

        <div class="col-md-4">
          <div class="card">
            <img src="/LaporWeb/page/img/eminem.jpg" class="card-img-top" alt="Berita 1">
            <div class="card-body">
              <h5 class="card-title">Judul Berita 1</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/LaporWeb/page/img/news2.1.jpeg" class="card-img-top" alt="Berita 2">
            <div class="card-body">
              <h5 class="card-title">Judul Berita 2</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="/LaporWeb/page/img/news3.jpg" class="card-img-top" alt="Berita 3">
            <div class="card-body">
              <h5 class="card-title">Judul Berita 3</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
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
              <img src="/LaporWeb/page/img/news3.jpg" alt="User" class="rounded-circle" style="height: 80px;">
            </div>
            <h5 class="mt-3">John Doe</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <div class="carousel-item">
            <div class="d-flex justify-content-center">
              <img src="/LaporWeb/page/img/news3.jpg" alt="User" class="rounded-circle" style="height: 80px;">
            </div>
            <h5 class="mt-3">Jane Smith</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <?php include 'page/component/footer.php'; ?>
</body>

</html>