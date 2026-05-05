<?php
 $obj = new Profil();
 $row = $obj->getProfil();
?>
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">Edit Profil</div>
    <div class="card-body">
        <form method="POST" action="controller/profilController.php">
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Foto Profil</label>
                <input type="text" name="foto" class="form-control" value="<?= $row['foto'] ?>"
                    placeholder="nama_file.jpg">
                <small class="text-muted">Pastikan file ada di folder img/</small>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>">
            </div>
            <div class="mb-3">
                <label>Deskripsi (About Me)</label>
                <textarea name="deskripsi" class="form-control" rows="5"><?= $row['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>LinkedIn URL</label>
                <input type="text" name="linkedin" class="form-control" value="<?= $row['linkedin'] ?>">
            </div>
            <div class="mb-3">
                <label>GitHub URL</label>
                <input type="text" name="github" class="form-control" value="<?= $row['github'] ?>"
                    placeholder="github.com/username">
            </div>
            <div class="mb-3">
                <label>Instagram URL</label>
                <input type="text" name="instagram" class="form-control" value="<?= $row['instagram'] ?>">
            </div>
            <button class="btn btn-success" name="proses" value="ubah">Simpan Perubahan</button>
            <a href="index.php?hal=profil_list" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>