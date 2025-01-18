<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Layanan Pengaduan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
	</style>
</head>

<body>
	<div class="container py-5">
		<!-- Judul -->
		<div class="form-title mb-4">
			<h4>Layanan Aspirasi dan Pengaduan Online Rakyat</h4>
			<p>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</p>
			<hr style="width: 100px; margin: 0 auto; border-width: 2px; border-color: black;">
		</div>

		<!-- Form -->
		<div class="form-container">
			<!-- Header -->
			<div class="form-header">
				Sampaikan Laporan Keluh Kesah Anda Sekarang!!
			</div>

			<!-- Pilihan Jenis Laporan -->
			<div class="mb-4">
				<label class="form-label">Pilih Jenis Laporan*</label>
				<div class="btn-group w-100" role="group">
					<button type="button" class="btn btn-active">Pengaduan</button>
					<button type="button" class="btn btn-light">Aspirasi</button>
					<button type="button" class="btn btn-light">Permintaan Informasi</button>
				</div>
			</div>

			<!-- Input Fields -->
			<form>
				<input type="text" class="form-control" placeholder="Judul Laporan Anda*" required>
				<textarea class="form-control" rows="4" placeholder="Ketik isi laporan Anda*" required></textarea>
				<input type="date" class="form-control" placeholder="Tanggal Kejadian*" required>
				<input type="text" class="form-control" placeholder="Lokasi Kejadian*" required>
				<input type="text" class="form-control" placeholder="Instansi Tujuan*" required>
				<input type="text" class="form-control" placeholder="Kategori Laporan Anda*" required>
				<button type="submit" class="btn btn-submit mt-3">LAPOR!</button>
			</form>
		</div>





		<div class="container mt-4">
			<h4 class="mb-4">Laporan Saya</h4>

			<div class="container">
				<!-- Card 1: Pending -->
				<div class="card mb-4">
					<div class="card-body">
						<div class="row">
							<!-- Avatar -->
							<div class="col-auto">
								<img src="./page/img/news3.jpg" alt="User Avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
							</div>
							<!-- Content -->
							<div class="col">
								<div class="card-header fw-bold">Rocky RS</div>
								<p>
									<span><strong>Laporan:</strong> Pengaduan</span> |
									<span><strong>Lokasi Kejadian:</strong> Bandung</span> <br>
									<span class="status-pending text-warning">30 menit yg lalu - Pending</span>
								</p>
								<p><strong>Kategori Laporan:</strong> Instansi Pemerintahan</p>
								<p><strong>Dinas:</strong> Komunikasi dan Informatika Provinsi Jawa Timur</p>
								<p><strong>Judul:</strong> Informasi Pendaftaran 100 anggota pemerintah jawa barat</p>
								<p>Hallo kak saya mau laporan kalo guild kita sudah penuh maka anggota ngawi nya di alihkan kemana ya?
									Tolong dijawab secepatnya ya kak, terimakasih.</p>
							</div>
							<!-- Buttons -->
							<div class="col-auto d-flex flex-column flex-md-row align-items-start flex-wrap">
								<button class="btn btn-primary btn-sm me-md-2 mb-2">EDIT</button>
								<button class="btn btn-danger btn-sm mb-2">DELETE</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Card 2: Accepted -->
				<div class="card mb-4">
					<div class="card-body">
						<div class="row">
							<!-- Avatar -->
							<div class="col-auto">
								<img src="./page/img/news3.jpg" alt="User Avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
							</div>
							<!-- Content -->
							<div class="col">
								<div class="card-header fw-bold">Rocky RS</div>
								<p>
									<span><strong>Laporan:</strong> Pengaduan</span> |
									<span><strong>Lokasi Kejadian:</strong> Bandung</span> <br>
									<span class="status-accepted text-success">30 menit yg lalu - Diterima oleh admin</span>
								</p>
								<p><strong>Kategori Laporan:</strong> Instansi Pemerintahan</p>
								<p><strong>Dinas:</strong> Komunikasi dan Informatika Provinsi Jawa Timur</p>
								<p><strong>Judul:</strong> Informasi Pendaftaran 100 anggota pemerintah jawa barat</p>
								<p>Hallo kak saya mau laporan kalo guild kita sudah penuh maka anggota ngawi nya di alihkan kemana ya?
									Tolong dijawab secepatnya ya kak, terimakasih.</p>
							</div>
							<!-- Buttons -->

						</div>
					</div>
				</div>

				<!-- Card 3: Rejected -->
				<div class="card mb-4">
					<div class="card-body">
						<div class="row">
							<!-- Avatar -->
							<div class="col-auto">
								<img src="./page/img/news3.jpg" alt="User Avatar" class="rounded-circle img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
							</div>
							<!-- Content -->
							<div class="col">
								<div class="card-header fw-bold">Rocky RS</div>
								<p>
									<span><strong>Laporan:</strong> Pengaduan</span> |
									<span><strong>Lokasi Kejadian:</strong> Bandung</span> <br>
									<span class="status-rejected text-danger">30 menit yg lalu - Laporan Ditolak</span>
								</p>
								<p><strong>Kategori Laporan:</strong> Instansi Pemerintahan</p>
								<p><strong>Dinas:</strong> Dinas Presiden</p>
								<p><strong>Judul:</strong> Ganti Wapres</p>
								<p>Ayo ayo</p>
								<div class="message-box mt-3 bg-secondary text-white">PESAN YANG DI TERIMA TIDAK JELAS</div>
							</div>
							<!-- Buttons -->
							<div class="col-auto d-flex flex-column flex-md-row align-items-start flex-wrap">
								<button class="btn btn-danger btn-sm mb-2">DELETE</button>
							</div>
						</div>
					</div>
				</div>
			</div>



			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>