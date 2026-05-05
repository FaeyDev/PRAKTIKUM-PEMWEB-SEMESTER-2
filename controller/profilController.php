<?php
session_start();
include_once '../koneksi.php';
include_once '../models/Profil.php';

 $obj = new Profil();
 $proses = $_POST['proses'] ?? '';

if ($proses == 'ubah') {

    $data = [
        $_POST['nama'],
        $_POST['deskripsi'],
        $_POST['foto'],
        $_POST['email'],
        $_POST['linkedin'],
        $_POST['github'],     
        $_POST['instagram'],
        1 
    ];
    $obj->ubah($data);
    
    $alertType = "success";
    $alertTitle = "Berhasil!";
    $alertText = "Profil Anda berhasil diperbarui.";
    $nextUrl = "../index.php?hal=profil_list";
} else {
    header("Location: ../index.php?hal=home");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Processing...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
    Swal.fire({
        title: '<?= $alertTitle ?>',
        text: '<?= $alertText ?>',
        icon: '<?= $alertType ?>',
        timer: 1500,
        showConfirmButton: false
    }).then(() => {
        window.location = '<?= $nextUrl ?>';
    });
    </script>
</body>

</html>