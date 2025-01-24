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
    <title>Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

<?php include 'component/navbar.php'; ?>
<div class="container my-5">
    <div class="row">
    <div class="col-2">
       
        </div>
        <div class="col-8">
        <div class="ratio ratio-16x9 d-flex justify-content-center align-items-center mx-100">
                <img src="/LaporWeb/page/img/image.png" alt="Gambar Berita" class="img-fluid rounded shadow-sm ">
            </div>
        </div>
        <div class="col-2">
       
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <h2 class="fw-bold">soal janji prabowo dirikan 300 fakultas kedokteran, begini kata kemendikti</h2>
            <p class="text-muted small">
                By <span class="fw-semibold">AUTHOR</span> - <span>JAN 23, 2025</span>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p>
            Jakarta - Prabowo Subianto sempat mengatakan akan mendirikan 300 fakultas kedokteran. Di samping itu, Prabowo mengatakan akan menebar 20 ribu beasiswa kuliah bidang kedokteran serta science, technology, engineering dan mathematics (STEM).
Hal tersebut disampaikan Prabowo sebelum terpilih menjadi Presiden RI 2024-2029 pada penjelasan visi-misi bidang kesehatan dan pendidikan dalam Debat Capres terakhir di Jakarta Convention Center (JCC), Senayan, Minggu (4/2/2024).

"Kita kekurangan 140 ribu dokter di Indonesia dan itu akan segera kita atasi dengan cara, kita akan menambah fakultas kedokteran di Indonesia, dari yang sekarang 92, kita akan membangun 300 fakultas kedokteran," kata Prabowo.-
            </p>
            <p>
            "Kita juga akan mengirim 10 ribu anak-anak pinter dari lulusan SMA. Kita akan beri beri 10 ribu beasiswa untuk kuliah kedokteran dan juga 10 ribu lagi kita akan beri beasiswa untuk belajar sains, teknologi engineering, matematika, kimia biologi dan fisika. Itu kita rebut teknologi, kita rebut sains," sambungnya.

            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
