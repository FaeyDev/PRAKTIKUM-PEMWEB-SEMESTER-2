<?php
 $id = $_GET['id'] ?? null;
 $obj = new Organisasi();
if($id) $row = $obj->getOrganisasi($id); else $row = [];
?>
<div class="card shadow-sm">
    <div class="card-header bg-white">Form Organisasi</div>
    <div class="card-body">
        <form method="POST" action="controller/organisasiController.php">
            <div class="mb-3"><label>Nama Organisasi</label><input type="text" name="nama_organisasi"
                    class="form-control" value="<?= $row['nama_organisasi']??'' ?>"></div>
            <div class="mb-3"><label>Jabatan</label><input type="text" name="jabatan" class="form-control"
                    value="<?= $row['jabatan']??'' ?>"></div>
            <div class="mb-3"><label>Periode</label><input type="text" name="periode" class="form-control"
                    value="<?= $row['periode']??'' ?>" placeholder="Contoh: 2020 - 2021"></div>
            <div class="mb-3"><label>Foto</label><input type="text" name="foto" class="form-control"
                    value="<?= $row['foto']??'' ?>"></div>
            <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi"
                    class="form-control"><?= $row['deskripsi']??'' ?></textarea></div>
            <?php if($id): ?>
            <button class="btn btn-warning" name="proses" value="ubah">Ubah</button>
            <input type="hidden" name="id" value="<?= $id ?>">
            <?php else: ?>
            <button class="btn btn-primary" name="proses" value="simpan">Simpan</button>
            <?php endif; ?>
            <a href="index.php?hal=organisasi_list" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>