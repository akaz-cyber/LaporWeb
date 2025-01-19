<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Ambil data dari form
     $id = $_POST['id'];
     $namaLengkap = $_POST['nama_lengkap'];
     $tempatTinggal = $_POST['tempat_tinggal'];
     $tanggalLahir = $_POST['tanggal_lahir'];
     $jenisKelamin = $_POST['jenis_kelamin'];
     $noTelp = $_POST['no_telp'];
     $email = $_POST['email'];
     $username = $_POST['username'];
     $penyandangDisabilitas = $_POST['penyandang_disabilitas'];
     $password = $_POST['password'];
     $confirmPassword = $_POST['confirm_password']; 

     // Validasi jika password diisi
     if (!empty($password) && $password !== $confirmPassword) {
        // Menampilkan alert dan tetap di halaman yang sama
        echo "<script>
            alert('Password dan konfirmasi password tidak cocok!');
            window.history.back();
        </script>";
        exit;
    }

      // Update query
      if (!empty($password)) {
        // Jika password diisi, hash password dan update
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $updateQuery = "UPDATE users SET 
            nama_lengkap = '$namaLengkap', 
            tempat_tinggal = '$tempatTinggal', 
            tanggal_lahir = '$tanggalLahir', 
            jenis_kelamin = '$jenisKelamin', 
            no_telp = '$noTelp', 
            email = '$email', 
            username = '$username',
            penyandang_disabilitas = '$penyandangDisabilitas', 
            password = '$passwordHash' 
            WHERE id_user = '$id'";
    } else {
        // Jika password tidak diisi, tidak perlu update password
        $updateQuery = "UPDATE users SET 
            nama_lengkap = '$namaLengkap', 
            tempat_tinggal = '$tempatTinggal', 
            tanggal_lahir = '$tanggalLahir', 
            jenis_kelamin = '$jenisKelamin', 
            no_telp = '$noTelp', 
            email = '$email', 
            username = '$username',
            penyandang_disabilitas = '$penyandangDisabilitas' 
            WHERE id_user = '$id'";
    }

   

    // Eksekusi query
    if (mysqli_query($conn, $updateQuery)) {
        // Jika update berhasil
        echo "<script>alert('Pembaruan data pengguna berhasil!'); window.location.href='kelolauser';</script>";
    } else {
        // Jika update gagal
        echo "<script>alert('Pembaruan data pengguna gagal!'); window.location.href='kelolauser';</script>";
    }

    // Redirect ke halaman kelolauser.php dengan status
    header('Location: kelolauser?status=' . $status);
    exit;
}
?>
