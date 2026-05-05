<?php
include_once '../koneksi.php';
include_once '../models/Pendidikan.php';
include_once '../models/Organisasi.php';
include_once '../models/Skill.php';

 $keyword = $_GET['keyword'] ?? '';

if (!empty($keyword)) {
    // 1. Konversi ke huruf kecil agar pencarian case-insensitive
    $keyword = trim(strtolower($keyword));

    // --- LOGIKA SHORTCUT (PINTASAN KATEGORI) ---
    
    if ($keyword == 'organisasi' || $keyword == 'organization') {
        header("Location: ../index.php?hal=organisasi_list");
        exit;
    }
    
    if ($keyword == 'skill' || $keyword == 'skills' || $keyword == 'keahlian') {
        header("Location: ../index.php?hal=skill_list");
        exit;
    }
    
    if ($keyword == 'pendidikan' || $keyword == 'education') {
        header("Location: ../index.php?hal=pendidikan_list");
        exit;
    }

    // --- LOGIKA PENCARIAN DATA SPESIFIK ---

    // A. Cari di Pendidikan
    $objPendidikan = new Pendidikan();
    $rsPendidikan = $objPendidikan->cari($keyword);
    $countPendidikan = $rsPendidikan->rowCount();

    if ($countPendidikan > 0) {
        header("Location: ../index.php?hal=pendidikan_list");
        exit;
    } 

    // B. Cari di Organisasi
    $objOrganisasi = new Organisasi();
    $rsOrganisasi = $objOrganisasi->cari($keyword);
    $countOrganisasi = $rsOrganisasi->rowCount();

    if ($countOrganisasi > 0) {
        header("Location: ../index.php?hal=organisasi_list");
        exit;
    } 

    // C. Cari di Skill
    $objSkill = new Skill();
    $rsSkill = $objSkill->cari($keyword);
    $countSkill = $rsSkill->rowCount();

    if ($countSkill > 0) {
        header("Location: ../index.php?hal=skill_list");
        exit;
    } 

    // Jika sampai sini berarti tidak ada apa-apa
    echo "<script>
            alert('Data \"$keyword\" tidak ditemukan!');
            window.location='../index.php?hal=home';
          </script>";
    exit;

} else {
    header("Location: ../index.php?hal=home");
    exit;
}
?>