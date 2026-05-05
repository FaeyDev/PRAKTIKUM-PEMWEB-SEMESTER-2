<?php
session_start();
// Pastikan koneksi ada
include_once 'koneksi.php';
include_once 'models/Profil.php';
include_once 'models/Pendidikan.php';
include_once 'models/Organisasi.php';
include_once 'models/Skill.php';

// --- LOGIKA PENGALIHAN  ---
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] !== true) {
    $hal = $_GET['hal'] ?? ''; // Ambil nama halaman, jika kosong isi string kosong
    if ($hal != 'login' && $hal != 'register') {
        echo "<script>window.location='index.php?hal=login';</script>";
        exit;
    }
} else {
    $hal = $_GET['hal'] ?? '';
    
    // Jangan izinkan user yang sudah login mengakses halaman login/register lagi
    if ($hal == 'login' || $hal == 'register') {
        echo "<script>window.location='index.php?hal=home';</script>";
        exit;
    }
}
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Freeze AD Kaban | Portfolio</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
    }

    /* Navbar Style */
    .navbar {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    }

    .nav-link {
        font-weight: 500;
        color: #333 !important;
        transition: 0.3s;
    }

    .nav-link:hover {
        color: #0d6efd !important;
    }

    /* Card General Style */
    .card-custom {
        border: none;
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    /* Carousel Style */
    .carousel-item img {
        height: 400px;
        object-fit: cover;
        filter: brightness(0.9);
    }

    /* Glass Card Style */
    .glass-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        border-radius: 20px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .glass-card:hover {
        background: rgba(255, 255, 255, 0.95);
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .glass-card .card-body {
        padding: 2.5rem 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 100%;
    }

    .glass-card i {
        font-size: 2.5rem;
        color: #444;
        margin-bottom: 1.5rem;
        opacity: 0.7;
        transition: 0.3s;
    }

    .glass-card:hover i {
        opacity: 1;
        color: #0d6efd;
    }

    .stat-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .stat-number {
        font-size: 2.8rem;
        font-weight: 700;
        color: #222;
        line-height: 1.2;
        margin-bottom: 0.2rem;
    }

    .stat-desc {
        font-size: 0.9rem;
        color: #666;
        font-weight: 400;
        margin-bottom: 2rem;
        line-height: 1.5;
        min-height: 3em;
    }

    .btn-glass {
        border: 2px solid #333;
        color: #333;
        font-weight: 600;
        padding: 0.6rem 2rem;
        border-radius: 50px;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 1px;
        transition: 0.3s;
    }

    .btn-glass:hover {
        background-color: #333;
        color: #fff;
    }
    </style>
</head>

<body>

    <div class="row g-0">
        <div class="col-md-12">
            <?php include_once 'header.php'; ?>
        </div>
    </div>

    <div class="sticky-top">
        <?php include_once 'menu.php'; ?>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- 1. SIDEBAR  -->
            <div class="col-lg-4 mb-4">
                <?php include_once 'sidebar.php'; ?>
            </div>

            <!-- 2. KONTEN UTAMA  -->
            <div class="col-lg-8">
                <?php
        if (isset($_GET['hal'])) {
          $req = $_GET['hal'];
          include_once $req . '.php';
        } else {
          include_once 'home.php';
        }
        ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php include_once 'footer.php'; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<!-- created by @Freeze -->