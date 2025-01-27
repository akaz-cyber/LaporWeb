<?php
session_start();
require_once('koneksi.php');
require_once('helper.php');

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Berita dan Informasi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="/LaporWeb/page/css/artikle.css">
	
</head>

<body>
<?php include 'component/navbar.php'; ?>

	<div class="container my-5">
		<h3 class="mb-5">Berita dan Informasi</h3>

		<!-- Section 1: Gambar besar -->
		<div class="row mb-4">
			<!-- Gambar besar di kiri -->
			<div class="col-md-8 mb-5">
				<img src="/LaporWeb/page/img/eminem.jpg" class="img-fluid rounded img-main" alt="Main news image" />
				<h4 class="mt-3">Pasar Besar Ngawi Menjadi Tempat Cuci Uang</h4>
				<p class="text-muted">By NEWSPORTAL.ID • 07 Jan, 2025</p>
				<p>Investigasi mendalam mengungkap dugaan penggunaan Pasar Besar Ngawi sebagai sarana untuk melakukan pencucian uang. Transaksi mencurigakan di pasar tradisional ini menarik perhatian penegak hukum....</p>
			</div>

			<!-- Thumbnail di kanan -->
			<div class="col-md-4">
				<!-- Thumbnail Card 1 -->
				<div class="card-thumbnail d-flex align-items-center mb-3">
					<img src="/LaporWeb/page/img/sawah.jpg" alt="Thumbnail 1" class="rounded">
					<div class="ms-3">
						<p class="mb-1 fw-bold text-truncate-2">Musim panen padi yang melimpah di berbagai daerah... </p>
						<button class="btn btn-sm btn-red"  onclick="window.location.href='/LaporWeb/detailArtikle'">Selengkapnya</button>
					</div>
				</div>
				<!-- Thumbnail Card 2 -->
				<div class="card-thumbnail d-flex align-items-center mb-3">
					<img src="/LaporWeb/page/img/news2.jpeg" alt="Thumbnail 2" class="rounded">
					<div class="ms-3">
						<p class="mb-1 fw-bold text-truncate-2">korupsi terbesar di Indoensia yang di lakukan oleh orang orang yang...</p>
						<button class="btn btn-sm btn-red" onclick="window.location.href='/LaporWeb/detailArtikle'">Selengkapnya</button>
					</div>
				</div>
				<!-- Thumbnail Card 3 -->
				<div class="card-thumbnail d-flex align-items-center mb-3">
					<img src="/LaporWeb/page/img/image.png" alt="Thumbnail 3" class="rounded">
					<div class="ms-3">
						<p class="mb-1 fw-bold text-truncate-2">soal janji prabowo dirikan 300 fakultas kedokteran, begini kata kemendikti</p>
						<button class="btn btn-sm btn-red" onclick="window.location.href='/LaporWeb/detailArtikle'">Selengkapnya</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Section 2: Berita tambahan -->
		<div class="row gy-4">
			<div class="col-md-4">
				<div class="card">
					<img src="/LaporWeb/page/img/uang.jpg" alt="News 1" class="img-fluid rounded">
					<div class="card-body">
						<h5 class="card-title">Penaikan Kurs dollar ke Rupiah</h5>
						<p>Kenaikan Kurs Rupiah Ke Dollar yang sanagat signifikan terjadi tadi ...</p>
						<p class="text-muted">By NEWSPORTAL.ID • 07 Jan, 2025</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img src="/LaporWeb/page/img/isra.jpeg" alt="News 2" class="img-fluid rounded">
					<div class="card-body">
						<h5 class="card-title"> Acara Isra Mi'raj di Bandung </h5>
						<p>Warga Bandung akan melakukan agenda kegiatan Isra Mi'raj dengan mengundang ustad ternama untuk...</p>
						<p class="text-muted">By NEWSPORTAL.ID • 27 Jan, 2025</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img src="/LaporWeb/page/img/lampu.jpg" alt="News 3" class="img-fluid rounded">
					<div class="card-body">
						<h5 class="card-title">Pembagian Listrik Gratis</h5>
						<p>PLN melakukan pembagian Listrik gratis di beberapa lokasi yang belum mendapatkan...</p>
						<p class="text-muted">By NEWSPORTAL.ID • 07 Jan, 2025</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<?php include 'page/component/footer.php'; ?>
	
</body>

</html>