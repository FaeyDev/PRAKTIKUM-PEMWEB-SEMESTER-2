<?php
// Hapus baris $obj = new User() karena tidak diperlukan
// Kita cukup mengambil data user_id dari session yang sudah ada di index.php
if(!isset($_SESSION['user_id'])) {
    echo "<script>alert('Anda belum login!'); window.location='index.php?hal=login';</script>";
    exit;
}
 $user_id = $_SESSION['user_id'];
?>

<div class="card card-custom p-4 mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <h3 class="text-center fw-bold mb-4">Ubah Password</h3>
        <form action="controller/authController.php" method="POST">
            <input type="hidden" name="proses" value="ganti_password">

            <div class="mb-3">
                <label>Password Lama</label>
                <input type="password" name="password_lama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password" name="password_baru" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="password_konfirm" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Simpan Perubahan</button>
            <div class="text-center mt-3">
                <a href="index.php?hal=home">Batal</a>
            </div>
        </form>
    </div>
</div>