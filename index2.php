<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Masalah</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<!-- Header -->
	<header class="bg-light border-bottom">
		<nav class="navbar navbar-expand-lg navbar-light container">
			<a class="navbar-brand" href="#">
				<img src="./page/img/Lapor.png" alt="Logo" style="height: 40px;">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Artikel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Lapor</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Masuk</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Daftar</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<!-- Main Content -->
	<main class="container mt-5">
		<!-- Lapor Section -->
		<section class="container my-5">
			<div class="row align-items-center">
				<!-- Kolom untuk gambar -->
				<div class="col-md-6 text-center">
					<img src="./page/img/Lapor.png" alt="Lapor" class="img-fluid" style="height: 80%;">
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
				<!-- Gaya untuk mengatur gambar seragam -->
				<style>
					.card-img-top {
						width: 100%;
						/* Memastikan gambar menyesuaikan lebar kartu */
						height: 300px;
						/* Memberikan tinggi tetap */
						object-fit: cover;
						/* Memotong gambar agar tetap sesuai aspek rasio */
					}
				</style>

				<div class="col-md-4">
					<div class="card">
						<img src="./page/img/eminem.jpg" class="card-img-top" alt="Berita 1">
						<div class="card-body">
							<h5 class="card-title">Judul Berita 1</h5>
							<p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img src="./page/img/news2.jpeg" class="card-img-top" alt="Berita 2">
						<div class="card-body">
							<h5 class="card-title">Judul Berita 2</h5>
							<p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img src="./page/img/news3.jpg" class="card-img-top" alt="Berita 3">
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
							<img src="./page/img/news3.jpg" alt="User" class="rounded-circle" style="height: 80px;">
						</div>
						<h5 class="mt-3">John Doe</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					</div>
					<div class="carousel-item">
						<div class="d-flex justify-content-center">
							<img src="./page/img/news3.jpg" alt="User" class="rounded-circle" style="height: 80px;">
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

	<!-- Footer -->
	<footer class="bg-danger text-center py-4 mt-5">
		<p>Laporan segera mungkin masalah anda</p>
		<div class="d-flex justify-content-center mb-3">
			<a href="#" class="me-3"><img src="icon_facebook.png" alt="Facebook" style="height: 24px;"></a>
			<a href="#" class="me-3"><img src="icon_twitter.png" alt="Twitter" style="height: 24px;"></a>
			<a href="#"><img src="icon_instagram.png" alt="Instagram" style="height: 24px;"></a>
		</div>
		<p>&copy; 2025 Kelompok 2</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>