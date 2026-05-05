<?php
 $id = $_GET['id'] ?? null;
 $obj = new Skill();
if($id) $row = $obj->getSkill($id); else $row = [];
?>
<div class="card shadow-sm">
    <div class="card-header bg-white">Form Skill</div>
    <div class="card-body">
        <form method="POST" action="controller/skillController.php">
            <div class="mb-3"><label>Nama Skill</label><input type="text" name="nama_skill" class="form-control"
                    value="<?= $row['nama_skill']??'' ?>"></div>
            <div class="mb-3"><label>Kategori</label><input type="text" name="kategori" class="form-control"
                    value="<?= $row['kategori']??'' ?>"></div>
            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-select">
                    <option value="Beginner" <?= ($row['level']??'')=='Beginner'?'selected':'' ?>>Beginner</option>
                    <option value="Intermediate" <?= ($row['level']??'')=='Intermediate'?'selected':'' ?>>Intermediate
                    </option>
                    <option value="Expert" <?= ($row['level']??'')=='Expert'?'selected':'' ?>>Expert</option>
                </select>
            </div>
            <?php if($id): ?>
            <button class="btn btn-warning" name="proses" value="ubah">Ubah</button>
            <input type="hidden" name="id" value="<?= $id ?>">
            <?php else: ?>
            <button class="btn btn-primary" name="proses" value="simpan">Simpan</button>
            <?php endif; ?>
            <a href="index.php?hal=skill_list" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>