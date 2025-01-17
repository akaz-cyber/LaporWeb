<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php if (!isset($_SESSION['id_user'])): ?>
          <!-- Tampilkan Login dan Registrasi jika belum login -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="loginMultiuser/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="loginMultiuser/register.php">Registrasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="page/lapor.php">Lapor</a>
          </li>
        <?php else: ?>
          <!-- Tampilkan menu lain jika sudah login -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="lapor.php">Lapor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../loginMultiuser/logout.php">Logout</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
