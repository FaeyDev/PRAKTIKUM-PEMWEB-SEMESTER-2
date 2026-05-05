<?php
 $objProfil = new Profil();
 $profil = $objProfil->getProfil();
?>

<!-- JUDUL HALAMAN -->
<div class="alert alert-light border-0 shadow-sm mb-4">
    <h4 class="fw-bold m-0 text-dark">Selamat Datang di Portofolio <?= $profil['nama'] ?> 👋</h4>
    <p class="text-muted m-0">Berikut adalah ringkasan profil Saya.</p>
</div>

<!-- BAGIAN PROFIL UTAMA -->
<div class="card card-custom p-4 mb-4">
    <div class="row align-items-center">
        <div class="col-md-4 text-center">
            <div class="position-relative d-inline-block">
                <img src="img/<?= $profil['foto'] ?>" class="rounded-circle shadow-lg" width="180" height="180"
                    style="object-fit:cover;" alt="Foto Profil">
                <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-white rounded-circle"></span>
            </div>
        </div>
        <div class="col-md-8">
            <h2 class="fw-bold mb-1"><?= $profil['nama'] ?></h2>
            <span class="badge bg-primary mb-3">Web Developer</span>
            <p class="text-muted lead"><?= $profil['deskripsi'] ?></p>

            <div class="d-flex gap-2">
                <a href="index.php?hal=profil_list" class="btn btn-primary px-4 rounded-pill">Lihat Profil</a>
                <a href="index.php?hal=pendidikan_list" class="btn btn-outline-dark px-4 rounded-pill">Pendidikan</a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Kartu Pendidikan -->
    <div class="col-md-4">
        <div class="card glass-card h-100">
            <div class="card-body">
                <!-- Icon -->
                <i class="bi bi-mortarboard-fill"></i>

                <!-- Judul -->
                <h5 class="stat-title">Pendidikan</h5>

                <!-- Angka -->
                <div>2 Sekolah</div>

                <!-- Deskripsi -->
                <p>Menyelesaikan pendidikan dengan baik dan berhasil meraih prestasi.</p>

                <!-- Tombol (mt-auto mendorong tombol ke bawah agar rata) -->
                <a href="index.php?hal=pendidikan_list" class="btn btn-glass mt-auto">Detail</a>
            </div>
        </div>
    </div>

    <!-- Kartu Organisasi -->
    <div class="col-md-4">
        <div class="card glass-card h-100">
            <div class="card-body">
                <i class="bi bi-people-fill"></i>
                <h5 class="stat-title">Organisasi</h5>
                <h4>Pengalaman</h4>
                <p>Aktif berkontribusi dalam kegiatan sosial.</p>
                <a href="index.php?hal=organisasi_list" class="btn btn-glass mt-auto">Detail</a>
            </div>
        </div>
    </div>

    <!-- Kartu Skills -->
    <div class="col-md-4">
        <div class="card glass-card h-100">
            <div class="card-body">
                <i class="bi bi-tools"></i>
                <h5 class="stat-title">Skills</h5>
                <h4>Aktif</h4>
                <p>Kompetensi teknis & soft skill terkini.</p>
                <a href="index.php?hal=skill_list" class="btn btn-glass mt-auto">Detail</a>
            </div>
        </div>
    </div>
</div>