<?php
session_start();
include_once '../koneksi.php';
include_once '../models/Organisasi.php';

 $obj = new Organisasi();
 $proses = $_POST['proses'] ?? '';

if ($proses) {
    $data = [$_POST['nama_organisasi'], $_POST['jabatan'], $_POST['periode'], $_POST['deskripsi'], $_POST['foto']];

    switch ($proses) {
        case 'simpan':
            $obj->simpan($data);
            $alertType = "success";
            $alertTitle = "Berhasil!";
            $alertText = "Data organisasi berhasil ditambahkan.";
            $nextUrl = "../index.php?hal=organisasi_list";
            break;
        case 'ubah':
            $data[] = $_POST['id']; 
            $obj->ubah($data); 
            $alertType = "success";
            $alertTitle = "Berhasil!";
            $alertText = "Data organisasi berhasil diperbarui.";
            $nextUrl = "../index.php?hal=organisasi_list";
            break;
        case 'hapus':
            $obj->hapus($_POST['id']);
            $alertType = "success";
            $alertTitle = "Terhapus!";
            $alertText = "Data organisasi telah dihapus.";
            $nextUrl = "../index.php?hal=organisasi_list";
            break;
        default:
            header("Location: ../index.php?hal=home");
            exit;
    }
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