<div class="sidebar bg-danger text-white d-flex flex-column">
    <div class="text-center py-4">
        <div class="bg-light rounded-pill m-4 p-3">
            <img src="/LaporWeb/page/img/Lapor.png" alt="Logo" class="img-fluid mb-2" style="width: 50px;">
        </div>
    </div>
    <ul class="nav flex-column px-3">
        <li class="nav-item mb-2">
            <a href="adminDashboard" class="nav-link text-white" id="dashboard-link">Dashboard</a>
        </li>
        <li class="nav-item mb-2">
            <a href="adminLapor" class="nav-link text-white" id="lapor-link">Laporan</a>
        </li>
        <li class="nav-item">
            <a href="kelolauser" class="nav-link text-white" id="user-link">Users</a>
        </li>
    </ul>
    <a href="logout" class="btn btn-light mt-3 mx-3 mb-3 text-danger ">
        <i style="font-size:24px" class="fa">&#xf08b;</i>Keluar
    </a>
</div>


<script>

    document.addEventListener("DOMContentLoaded", function() {
        const currentPage = window.location.pathname;
        if (currentPage.includes('adminDashboard')) {
            document.getElementById('dashboard-link').classList.add('active');

        } else if (currentPage.includes('adminLapor')) {
            document.getElementById('lapor-link').classList.add('active');

        } else if (currentPage.includes('kelolauser')) {
            document.getElementById('user-link').classList.add('active');
        }
    });
</script>