<div class="card card-custom p-4 mx-auto" style="max-width: 400px;">
    <div class="card-body">
        <h3 class="text-center fw-bold mb-4">Login</h3>
        <form method="POST" action="controller/authController.php">
            <div class="mb-3">
                <label>Email / Username</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100" name="proses" value="masuk">Masuk</button>
            <div class="text-center mt-3">
                <small>Belum punya akun? <a href="index.php?hal=register">Daftar disini</a></small>
            </div>
        </form>
    </div>
</div>