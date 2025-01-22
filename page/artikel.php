<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Berita dan Informasi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style>
		.img-main {
			object-fit: cover;
			width: 100%;
			height: 300px;
		}

		.card-thumbnail {
			border: none;
		}

		.card-thumbnail img {
			object-fit: cover;
			height: 80px;
			width: 100px;
		}

		.btn-red {
			background-color: #ff4d4d;
			color: white;
			border: none;
			font-size: 0.9rem;
		}

		.btn-red:hover {
			background-color: #ff1a1a;
			color: white;
		}

		.text-truncate-2 {
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
		}
	</style>
	
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
				<h4 class="mt-3">Pasar Besar Ngawi Tersangka Korupsi JMK</h4>
				<p class="text-muted">By NEWSPORTAL.ID • 07 Jan, 2025</p>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
			</div>

			<!-- Thumbnail di kanan -->
			<div class="col-md-4">
				<!-- Thumbnail Card 1 -->
				<div class="card-thumbnail d-flex align-items-center mb-3">
					<img src="/LaporWeb/page/img/eminem.jpg" alt="Thumbnail 1" class="rounded">
					<div class="ms-3">
						<p class="mb-1 fw-bold text-truncate-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry... </p>
						<button class="btn btn-sm btn-red">Selengkapnya</button>
					</div>
				</div>
				<!-- Thumbnail Card 2 -->
				<div class="card-thumbnail d-flex align-items-center mb-3">
					<img src="/LaporWeb/page/img/news2.jpeg" alt="Thumbnail 2" class="rounded">
					<div class="ms-3">
						<p class="mb-1 fw-bold text-truncate-2">Lorem Ipsum is simply dummy text of the printing</p>
						<button class="btn btn-sm btn-red">Selengkapnya</button>
					</div>
				</div>
				<!-- Thumbnail Card 3 -->
				<div class="card-thumbnail d-flex align-items-center mb-3">
					<img src="/LaporWeb/page/img/news2.jpeg" alt="Thumbnail 3" class="rounded">
					<div class="ms-3">
						<p class="mb-1 fw-bold text-truncate-2">Lorem Ipsum is simply dummy text of the printing</p>
						<button class="btn btn-sm btn-red">Selengkapnya</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Section 2: Berita tambahan -->
		<div class="row gy-4">
			<div class="col-md-4">
				<div class="card">
					<img src="/LaporWeb/page/img/news2.jpeg" alt="News 1" class="img-fluid rounded">
					<div class="card-body">
						<h5 class="card-title">Lorem Ipsum is simply dummy text</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
						<p class="text-muted">By NEWSPORTAL.ID • 07 Jan, 2025</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img src="/LaporWeb/page/img/news2.jpeg" alt="News 2" class="img-fluid rounded">
					<div class="card-body">
						<h5 class="card-title">Lorem Ipsum is simply dummy text</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
						<p class="text-muted">By NEWSPORTAL.ID • 07 Jan, 2025</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img src="/LaporWeb/page/img/news2.jpeg" alt="News 3" class="img-fluid rounded">
					<div class="card-body">
						<h5 class="card-title">Lorem Ipsum is simply dummy text</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
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