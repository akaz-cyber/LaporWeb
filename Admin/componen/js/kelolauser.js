    const editUserModal = document.getElementById('editUserModal');
    editUserModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const userId = button.getAttribute('data-id');
        const row = button.closest('tr');

        // Ambil data dari tabel
        const namaLengkap = row.cells[2].textContent.trim();
        const username = row.cells[1].textContent.trim();
        const email = row.cells[3].textContent.trim();
        const tempatTinggal = row.cells[4].textContent.trim();
        const noTelp = row.cells[5].textContent.trim();
        const tanggalLahir = row.cells[7].textContent.trim();
        const penyandangDisabilitas = row.cells[8].textContent.trim();

        // Set nilai ke dalam form
        editUserModal.querySelector('#editUserId').value = userId;
        editUserModal.querySelector('#editNamaLengkap').value = namaLengkap;
        editUserModal.querySelector('#editTempatTinggal').value = tempatTinggal;
        editUserModal.querySelector('#editNoTelp').value = noTelp;
        editUserModal.querySelector('#editEmail').value = email;
        editUserModal.querySelector('#editUsername').value = username;
        editUserModal.querySelector('#editTanggalLahir').value = tanggalLahir;
        editUserModal.querySelector('#editPenyandangDisabilitas').value = penyandangDisabilitas;
    });



    function confirmDelete(userId) {
        if (confirm("Apakah Anda yakin ingin menghapus user ini?")) {
            window.location.href = "delete_byadmin?id_user=" + userId;
        }
    }
