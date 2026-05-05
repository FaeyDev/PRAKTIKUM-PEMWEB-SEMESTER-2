<div class="card card-custom p-4 mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <h3 class="text-center fw-bold mb-4">Daftar Akun</h3>
        <form method="POST" action="controller/authController.php">
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100" name="proses" value="daftar">Daftar Sekarang</button>
            <div class="text-center mt-3">
                <small>Sudah punya akun? <a href="index.php?hal=login">Login disini</a></small>
            </div>
        </form>
    </div>
</div>