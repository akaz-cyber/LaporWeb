<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- Brand -->
  	<a class="navbar-brand" href="#">
				<img src="../page/img/Lapor.png" alt="Logo" style="height: 40px;">
			</a>

    <!-- Toggler Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Menu Kiri -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="page/lapor.php">Lapor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Artikel</a>
        </li>
      </ul>

      <!-- Menu Kanan -->
      <ul class="navbar-nav">
        <?php if (!isset($_SESSION['id_user'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="loginMultiuser/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="loginMultiuser/register.php">Registrasi</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="../loginMultiuser/logout.php">Logout</a>
          </li>
        <?php endif; ?>
       
      </ul>
    </div>
  </div>
</nav>
