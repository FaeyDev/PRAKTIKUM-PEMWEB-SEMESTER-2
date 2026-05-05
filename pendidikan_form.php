<?php
 $id = $_GET['id'] ?? null;
 $obj = new Pendidikan();
if($id) $row = $obj->getPendidikan($id); else $row = [];
?>
<div class="card shadow-sm">
    <div class="card-header bg-white">Form Pendidikan</div>
    <div class="card-body">
        <form method="POST" action="controller/pendidikanController.php">
            <div class="mb-3"><label>Jenjang</label><input type="text" name="jenjang" class="form-control"
                    value="<?= $row['jenjang']??'' ?>"></div>
            <div class="mb-3"><label>Nama Sekolah</label><input type="text" name="nama_sekolah" class="form-control"
                    value="<?= $row['nama_sekolah']??'' ?>"></div>
            <div class="mb-3"><label>Tahun Lulus</label><input type="text" name="tahun_lulus" class="form-control"
                    value="<?= $row['tahun_lulus']??'' ?>"></div>
            <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi"
                    class="form-control"><?= $row['deskripsi']??'' ?></textarea></div>
            <?php if($id): ?>
            <button class="btn btn-warning" name="proses" value="ubah">Ubah</button>
            <input type="hidden" name="id" value="<?= $id ?>">
            <?php else: ?>
            <button class="btn btn-primary" name="proses" value="simpan">Simpan</button>
            <?php endif; ?>
            <a href="index.php?hal=pendidikan_list" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>