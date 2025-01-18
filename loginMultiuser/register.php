<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form action="process_register" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>NIK:</label>
        <input type="number" name="nik" maxlength="16" required><br><br>

        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br><br>

        <label>Tempat Tinggal saat ini:</label>
        <input type="text" name="tempat_tinggal" required><br><br>

        <label>Nomor Telepon:</label>
        <input type="text" name="no_telp" maxlength="15" required><br><br>

        <label>Penyandang Disabilitas:</label>
        <select name="penyandang_disabilitas" required>
            <option value="iya">Iya</option>
            <option value="tidak">Tidak</option>
        </select><br><br>

        <label>Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <label>Pekerjaan:</label>
        <input type="text" name="pekerjaan" required><br><br>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Konfirmasi Password:</label>
        <input type="password" name="confirm_password" required><br><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
