<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		/* Profile Header */
		.profile-header {
			display: flex;
			align-items: center;
			margin-bottom: 40px;
		}

		.profile-img {
			width: 120px;
			height: 120px;
			border-radius: 50%;
			object-fit: cover;
			border: 2px solid #ccc;
			margin-right: 20px;
		}

		.profile-name h3 {
			margin: 0;
			font-size: 24px;
			font-weight: bold;
		}

		.profile-name p {
			margin: 0;
			font-size: 16px;
			color: #555;
		}

		/* Edit Button */
		.card .edit-btn {
			position: absolute;
			top: 10px;
			right: 10px;
			background-color: #ff7f50;
			color: white;
			border: none;
			border-radius: 50%;
			width: 36px;
			height: 36px;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.card .edit-btn:hover {
			background-color: #e56740;
		}

		/* Card Container */
		.card {
			position: relative;
		}

		/* Data Row */
		.data-row {
			display: flex;
			justify-content: flex-start;
			align-items: center;
			margin-bottom: 15px;
		}

		.data-row span:first-child {
			width: 200px;
			font-weight: bold;
			color: #333;
			text-align: right;
			padding-right: 10px;
		}

		.data-row span.separator {
			padding-right: 10px;
		}

		.data-row span:last-child {
			flex: 1;
			text-align: left;
			color: #555;
		}

		/* Responsive Adjustments */
		@media (max-width: 768px) {
			.profile-header {
				flex-direction: column;
				text-align: center;
			}

			.profile-img {
				margin-right: 0;
				margin-bottom: 10px;
			}

			.data-row {
				flex-direction: column;
				align-items: flex-start;
			}

			.data-row span:first-child {
				text-align: left;
				padding-right: 0;
			}

			.data-row span.separator {
				display: none;
			}

			.data-row span:last-child {
				text-align: left;
			}
		}
	</style>
</head>

<body>
	<div class="container mt-5">
		<!-- Profile Header -->
		<div class="card p-4 mb-4 shadow-sm">
			<button class="edit-btn" title="Edit">
				<i class="bi bi-pencil"></i>
			</button>
			<div class="profile-header">
				<img src="./page/img/pp2.jpeg" alt="Profile" class="profile-img" style="width: 200px; height: 200px; border-style:solid;"">
				<div class=" profile-name">
				<h3>Ujang Suntara</h3>
				<p>Engineer Ngawi | UI/JMK</p>
			</div>
		</div>
	</div>

	<!-- Informasi Publik Section -->
	<div class="card p-4 mb-4 shadow-sm">
		<h5 class="card-title border-bottom pb-2">Informasi Publik</h5>
		<div class="data-row">
			<span>Nama Lengkap *</span>
			<span class="separator">:</span>
			<span>Ujang Suntara</span>
		</div>
		<div class="data-row">
			<span>Username *</span>
			<span class="separator">:</span>
			<span>Suntara sama</span>
		</div>
	</div>

	<!-- Data Pribadi Section -->
	<div class="card p-4 shadow-sm">
		<h5 class="card-title border-bottom pb-2">Data Pribadi</h5>
		<div class="data-row">
			<span>Email *</span>
			<span class="separator">:</span>
			<span>ujangs@gmail.com</span>
		</div>
		<div class="data-row">
			<span>No. Handphone *</span>
			<span class="separator">:</span>
			<span>087348084294</span>
		</div>
		<div class="data-row">
			<span>Tanggal Lahir *</span>
			<span class="separator">:</span>
			<span>17/8/1945</span>
		</div>
		<div class="data-row">
			<span>No. Induk Kependudukan</span>
			<span class="separator">:</span>
			<span>696969696969696969</span>
		</div>
		<div class="data-row">
			<span>Jenis Kelamin *</span>
			<span class="separator">:</span>
			<span>Laki - Laki</span>
		</div>
		<div class="data-row">
			<span>Pekerjaan *</span>
			<span class="separator">:</span>
			<span>Karyawan Swasta</span>
		</div>
		<div class="data-row">
			<span>Penyandang Disabilitas *</span>
			<span class="separator">:</span>
			<span>Tidak</span>
		</div>
		<div class="data-row">
			<span>Tempat Tinggal Saat Ini *</span>
			<span class="separator">:</span>
			<span>Kabupaten: Ngawi Selatan</span>
		</div>
		<div class="data-row">
			<span>Alamat</span>
			<span class="separator">:</span>
			<span>Jln. Kimcoh, Kota, Ngawi Barat, Kab. Ngawi no.69</span>
		</div>
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
</body>

</html>