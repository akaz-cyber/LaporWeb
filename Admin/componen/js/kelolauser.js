
    function confirmDelete(userId) {
        if (confirm("Apakah Anda yakin ingin menghapus user ini?")) {
            window.location.href = "delete_byadmin?id_user=" + userId;
        }
    }
