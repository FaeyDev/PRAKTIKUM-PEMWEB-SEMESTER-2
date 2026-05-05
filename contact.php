<div class="card card-custom p-4">
    <div class="card-body">
        <h3 class="fw-bold mb-4">Contact Me</h3>

        <!-- Tambahkan action ke controller dan method="POST" -->
        <form action="controller/contactController.php" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Subjek</label>
                <input type="text" name="subject" class="form-control" placeholder="Subjek pesan" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pesan</label>
                <textarea name="message" class="form-control" rows="5" placeholder="Tulis pesan Anda di sini..."
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4">Kirim Pesan</button>
        </form>
    </div>
</div>