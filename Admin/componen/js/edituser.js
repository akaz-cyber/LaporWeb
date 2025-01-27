document.querySelectorAll('[data-bs-target="#editUserModal"]').forEach(button => {
    button.addEventListener('click', function() {
        document.getElementById('editUserId').value = this.getAttribute('data-id');
        document.getElementById('editNamaLengkap').value = this.getAttribute('data-nama');
        document.getElementById('editUsername').value = this.getAttribute('data-username');
        document.getElementById('editEmail').value = this.getAttribute('data-email');
        document.getElementById('editNoTelp').value = this.getAttribute('data-no_telp');
        document.getElementById('editTanggalLahir').value = this.getAttribute('data-tanggal_lahir');
        document.getElementById('editJenisKelamin').value = this.getAttribute('data-jenis_kelamin');
        document.getElementById('editPekerjaan').value = this.getAttribute('data-pekerjaan');
        document.getElementById('editPenyandangDisabilitas').value = this.getAttribute('data-penyandang_disabilitas');
        document.getElementById('editTempatTinggal').value = this.getAttribute('data-tempat_tinggal');
        document.getElementById('editNIK').value = this.getAttribute('data-nik');
        document.getElementById('editAlamat').value = this.getAttribute('data-alamat');
    });
});