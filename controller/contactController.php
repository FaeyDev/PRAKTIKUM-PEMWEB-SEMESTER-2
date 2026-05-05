<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email_from = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'agustinovfreeze@gmail.com';
        $mail->Password   = 'bpdf emvc jwvh sjuy';       
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Pengaturan Penerima & Pengirim
        $mail->setFrom('agustinovfreeze@gmail.com', 'Portofolio Website');
        $mail->addAddress('agustinovfreeze@gmail.com', 'Freeze AD Kaban');
        $mail->addReplyTo($email_from, $name);

        // Isi Email
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = "Nama: $name\nEmail: $email_from\n\nPesan:\n$message";

        // Kirim Email
        $mail->send();

        // Sukses
        $alertType = "success";
        $alertTitle = "Terkirim!";
        $alertText = "Pesan telah berhasil terkirim ke inbox Anda.";
        $nextUrl = "../index.php?hal=contact";

    } catch (Exception $e) {
        // Gagal (Cek Koneksi Internet / Password Salah)
        $alertType = "error";
        $alertTitle = "Gagal Mengirim";
        $alertText = "Error: " . $mail->ErrorInfo;
        $nextUrl = "../index.php?hal=contact";
    }
} else {
    header("Location: ../index.php?hal=home");
    exit;
}
?>
<!-- Wrapper HTML -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Sending...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
    Swal.fire({
        title: '<?= $alertTitle ?>',
        text: '<?= $alertText ?>',
        icon: '<?= $alertType ?>',
        timer: 3000,
        showConfirmButton: false
    }).then(() => {
        window.location = '<?= $nextUrl ?>';
    });
    </script>
</body>

</html>