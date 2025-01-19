<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="page/css/indexS.css">
    <title>Form Registrasi</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <a class="nav-link mt-3 " href="/LaporWeb/"  style="width: 6%;"><img src="/LaporWeb/page/img/back.png" alt="Lapor" class="img-fluid"></a>

    <h2 class="text-center">Selamat datang, silahkan masuk dahulu untuk melapor</h2>
    <hr class="bg-black mx-auto" style="height: 5px; width: 20%;">
<!-- kontainer utama yang di atas ga masukin sengaja -->
<div class="main mx-5">

<div class="col-md-10 bg-danger mx-auto w-80 rounded border border-dark">
<p class="text-white mx-5 mt-2"> <i class="fa fa-exclamation-circle text-primary  " ></i> Mengapa kami meminta data ini?</p>
<p class="text-white mx-3">Layanan SP4N-LAPOR! mengumpulkan data pribadi pengguna sebagai jaminan keabsahan dari aduan atau aspirasi yang disampaikan, pengenal identitas, memverifikasi akun dan mengirim notifikasi laporan, menilai tingkat partisipasi publik, pengolahan dan analisis data, penyusunan perencanaan dan pengambilan kebijakan, monitoring dan evaluasi, dan mendorong terciptanya kebijakan yang inklusif.</p>

</div>
<div class="col-md-8 mt-4 text-center mx-auto bg-warning w-50 rounded-pill border border-dark">
<p class="text-white mx-auto mt-2"> Isilah data diri dengan baik dan benar!</p>


</div>
    <form action="../process/process_register.php" method="POST" class="mt-5">
    <!-- container full di form -->
    <div class="row  mb-6">
        <div class="col-md-5 ps-5">
    <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>NIK:</label><br>
        <input type="number" name="nik" maxlength="16" required><br><br>

        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" required><br><br>

        <label>Tempat Tinggal:</label><br>
        <input type="text" name="tempat_tinggal" required><br><br>

        <label>Nomor Telepon:</label><br>
        <input type="text" name="no_telp" maxlength="15" required><br><br>

        <label>Penyandang Disabilitas:</label><br>
        <select name="penyandang_disabilitas" required>
            <option value="ya">Iya</option>
            <option value="tidak">Tidak</option>
        </select><br><br>

        </div>  
<!-- ------------------------------------------------------ -->
 <div class="col-md-6 ps-5 ">
 <label>Jenis Kelamin:</label><br>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>
 <label>Pekerjaan:</label><br>
        <input type="text" name="pekerjaan" required><br><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" rows="3" class="w-100" required></textarea><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Konfirmasi Password:</label><br>
        <input type="password" name="confirm_password" required><br><br>
        </div>
        <button type="submit" class="mx-5-auto w-70 py-2 bg-danger rounded-pill border">Daftar</button>
         </div> 
    </form>
    </div>

    <?php include 'page/component/footer.php'; ?>
</body>

</html>