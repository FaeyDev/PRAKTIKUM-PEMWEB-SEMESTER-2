<?php
session_start(); 
include_once '../koneksi.php';

 $proses = $_POST['proses'] ?? '';
 
if ($proses == 'daftar') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname, email, username, password, role) VALUES (?,?,?,?,?)";
    $ps = $GLOBALS['dbh']->prepare($sql);
    $ps->execute([$fullname, $email, $username, $password, 'user']);
    
    $alertType = "success";
    $alertTitle = "Registrasi Berhasil!";
    $alertText = "Silakan login dengan akun Anda.";
    $nextUrl = "../index.php?hal=login";
}

elseif ($proses == 'masuk') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ? OR username = ?";
    $ps = $GLOBALS['dbh']->prepare($sql);
    $ps->execute([$email, $email]);
    $rs = $ps->fetch();

    if ($rs && password_verify($password, $rs['password'])) {
        $_SESSION['user_id'] = $rs['id'];
        $_SESSION['user_name'] = $rs['fullname'];
        $_SESSION['role'] = $rs['role'];
        $_SESSION['login_status'] = true;

        $alertType = "success";
        $alertTitle = "Login Berhasil!";
        $alertText = "Selamat Datang, " . addslashes($rs['fullname']);
        $nextUrl = "../index.php?hal=profil_list";
    } else {
        $alertType = "error";
        $alertTitle = "Login Gagal";
        $alertText = "Email, Username, atau Password salah!";
        $nextUrl = "../index.php?hal=login";
    }
}

elseif ($proses == 'ganti_password') {
    $pass_lama = $_POST['password_lama'];
    $pass_baru = $_POST['password_baru'];
    $pass_konfirm = $_POST['password_konfirm'];
    
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT password FROM users WHERE id = ?";
    $ps = $dbh->prepare($sql);
    $ps->execute([$user_id]);
    $row = $ps->fetch();
    
    if ($row && password_verify($pass_lama, $row['password'])) {
        if ($pass_baru == $pass_konfirm) {
            $hashBaru = password_hash($pass_baru, PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE users SET password = ? WHERE id = ?";
            $psUpd = $dbh->prepare($sqlUpdate);
            $psUpd->execute([$hashBaru, $user_id]);
            
            $alertType = "success";
            $alertTitle = "Berhasil";
            $alertText = "Password berhasil diubah!";
            $nextUrl = "../index.php?hal=home";
        } else {
            $alertType = "warning";
            $alertTitle = "Gagal";
            $alertText = "Konfirmasi password baru tidak sama!";
            $nextUrl = "";
        }
    } else {
        $alertType = "error";
        $alertTitle = "Gagal";
        $alertText = "Password lama salah!";
        $nextUrl = "";
    }
}

elseif (isset($_GET['logout'])) {
    session_destroy();
    $alertType = "info";
    $alertTitle = "Logout Berhasil";
    $alertText = "Sampai jumpa lagi!";
    $nextUrl = "../index.php?hal=login";
}
?>

<!-- BAGIAN HTML: MEMUAT LIBRARY SWALALERT -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Processing...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
    <?php if(isset($alertType)): ?>
    Swal.fire({
        title: '<?= $alertTitle ?>',
        text: '<?= $alertText ?>',
        icon: '<?= $alertType ?>',
        timer: 2000,
        showConfirmButton: false
    }).then((result) => {
        <?php if(!empty($nextUrl)): ?>
        window.location = '<?= $nextUrl ?>';
        <?php endif; ?>
    });
    <?php endif; ?>
    </script>
</body>

</html>