<?php
session_start();
include_once '../koneksi.php';
include_once '../models/Skill.php';

 $obj = new Skill();
 $proses = $_POST['proses'] ?? '';

if ($proses) {
    $data = [$_POST['nama_skill'], $_POST['kategori'], $_POST['level']];

    switch ($proses) {
        case 'simpan':
            $obj->simpan($data);
            $alertType = "success";
            $alertTitle = "Berhasil!";
            $alertText = "Skill baru berhasil ditambahkan.";
            $nextUrl = "../index.php?hal=skill_list";
            break;
        case 'ubah':
            $data[] = $_POST['id']; 
            $obj->ubah($data); 
            $alertType = "success";
            $alertTitle = "Berhasil!";
            $alertText = "Data skill berhasil diperbarui.";
            $nextUrl = "../index.php?hal=skill_list";
            break;
        case 'hapus':
            $obj->hapus($_POST['id']);
            $alertType = "success";
            $alertTitle = "Terhapus!";
            $alertText = "Skill telah dihapus.";
            $nextUrl = "../index.php?hal=skill_list";
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