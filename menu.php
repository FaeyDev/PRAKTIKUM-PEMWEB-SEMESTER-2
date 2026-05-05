<nav class="navbar navbar-expand-lg navbar-light py-3">
    <div class="container">
        <!-- Brand / Logo -->
        <a class="navbar-brand fw-bold fs-4 text-primary" href="index.php?hal=home">
            <i class="bi bi-code-square"></i> Freeze.
        </a>

        <!-- Tombol Hamburger (Mobile) -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Konten Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- MENU KIRI (Home, About, Contact, My Studies) -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link px-3" href="index.php?hal=home">Home</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="index.php?hal=profil_list">About Me</a></li>

                <!-- Contact Me -->
                <li class="nav-item"><a class="nav-link px-3" href="index.php?hal=contact">Contact Me</a></li>

                <!-- My Studies Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        My Studies
                    </a>
                    <ul class="dropdown-menu shadow border-0">
                        <li><a class="dropdown-item" href="index.php?hal=pendidikan_list"><i
                                    class="bi bi-mortarboard me-2 text-muted"></i> Education</a></li>
                        <li><a class="dropdown-item" href="index.php?hal=organisasi_list"><i
                                    class="bi bi-people me-2 text-muted"></i> Organization</a></li>
                        <li><a class="dropdown-item" href="index.php?hal=skill_list"><i
                                    class="bi bi-lightning-charge me-2 text-muted"></i> Skills</a></li>
                    </ul>
                </li>
            </ul>

            <!-- MENU KANAN (Search & Login/Profile) -->
            <div class="d-flex align-items-center gap-3">

                <!-- Form Search -->
                <form class="d-flex" action="controller/searchController.php" method="GET">
                    <input class="form-control form-control-sm me-2 bg-dark text-white" type="search" name="keyword"
                        placeholder="Search" required style="width: 150px;">
                    <button class="btn btn-outline-success btn-sm fw-bold" type="submit">SEARCH</button>
                </form>

                <div class="vr"></div>

                <!-- LOGIC: JIKA SUDAH LOGIN (TAMPIL PROFILE) -->
                <?php if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == true): ?>

                <!-- Dropdown Profile -->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown">
                        <?= $_SESSION['user_name'] ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <!-- Tampilkan Role -->
                        <li>
                            <span class="dropdown-item-text fw-bold text-muted" style="font-size: 0.8rem;">
                                Role: <span class="badge bg-<?= $_SESSION['role'] == 'admin' ? 'danger' : 'info' ?>">
                                    <?= strtoupper($_SESSION['role']) ?>
                                </span>
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <!-- Menu Tentang Profile -->
                        <li><a class="dropdown-item" href="index.php?hal=profil_list">
                                <i class="bi bi-person me-2"></i> Tentang Profile
                            </a></li>

                        <!-- Menu Ubah Password -->
                        <li><a class="dropdown-item" href="index.php?hal=ubah_password">
                                <i class="bi bi-lock me-2"></i> Ubah Password
                            </a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <!-- Menu Logout -->
                        <li><a class="dropdown-item text-danger" href="controller/authController.php?logout=true">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a></li>
                    </ul>
                </div>

                <!-- LOGIC: JIKA BELUM LOGIN (TAMPIL TOMBOL LOGIN) -->
                <?php else: ?>
                <a href="index.php?hal=login" class="btn btn-primary btn-sm px-4 rounded-pill">Login</a>
                <?php endif; ?>

            </div> <!-- Tutup div MENU KANAN -->

        </div>
    </div>
</nav>