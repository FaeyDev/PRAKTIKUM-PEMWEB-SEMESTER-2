<?php
include_once 'koneksi.php';
include_once 'models/Skill.php';

 $obj = new Skill();
 $rs = $obj->index();
?>
<div class="card card-custom p-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0">Skills & Level</h5>

        <!-- Tombol Tambah (Hanya Admin) -->
        <?php if ($_SESSION['role'] == 'admin'): ?>
        <a href="index.php?hal=skill_form" class="btn btn-sm btn-primary">+ Tambah Skill</a>
        <?php else: ?>
        <span class="badge bg-secondary text-white">Mode View Only</span>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="row g-2">
            <?php foreach($rs as $row): ?>
            <div class="col-6 col-md-4 mb-3">
                <div class="card border h-100">
                    <div class="card-body text-center">
                        <h6 class="fw-bold"><?= $row['nama_skill'] ?></h6>
                        <span class="badge bg-secondary mb-2"><?= $row['kategori'] ?></span>
                        <div class="mt-2">
                            <span class="badge bg-info text-dark">Level: <?= $row['level'] ?></span>
                        </div>

                        <!-- WRAPPER TOMBOL (BERBEDA BERDASARKAN ROLE) -->
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                        <!-- LAYOUT ADMIN: Berjejer Rapi (Flex Gap) -->
                        <div class="d-flex flex-wrap gap-1 mt-3">
                            <!-- Detail -->
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#modalSkill" onclick="fillSkill(this)"
                                data-nama="<?= $row['nama_skill'] ?>" data-kategori="<?= $row['kategori'] ?>"
                                data-level="<?= $row['level'] ?>">
                                <i class="bi bi-eye"></i> Detail
                            </button>
                            <!-- Edit/Hapus -->
                            <div class="d-flex gap-1">
                                <a href="index.php?hal=skill_form&id=<?= $row['id'] ?>"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="controller/skillController.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="proses" value="hapus"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Hapus skill ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <?php else: ?>
                        <!-- LAYOUT USER: Tombol Detail Tepat di Tengah (Justify Center) -->
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#modalSkill" onclick="fillSkill(this)"
                                data-nama="<?= $row['nama_skill'] ?>" data-kategori="<?= $row['kategori'] ?>"
                                data-level="<?= $row['level'] ?>">
                                <i class="bi bi-eye"></i> Detail
                            </button>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- MODAL SKILL -->
<div class="modal fade" id="modalSkill" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-custom">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="modalTitleSkill">Detail Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="bi bi-lightning-charge text-warning fs-1"></i>
                </div>
                <h2 class="text-center fw-bold mb-3" id="viewNamaSkill">-</h2>
                <table class="table table-borderless">
                    <tr>
                        <td width="40%"><strong>Kategori</strong></td>
                        <td id="viewKategoriSkill" class="fw-bold text-primary">-</td>
                    </tr>
                    <tr>
                        <td><strong>Level</strong></td>
                        <td><span class="badge bg-info text-dark" id="viewLevelSkill">-</span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function fillSkill(btn) {
    document.getElementById('modalTitleSkill').textContent = "Detail " + btn.getAttribute('data-nama');
    document.getElementById('viewNamaSkill').textContent = btn.getAttribute('data-nama');
    document.getElementById('viewKategoriSkill').textContent = btn.getAttribute('data-kategori');
    document.getElementById('viewLevelSkill').textContent = btn.getAttribute('data-level');
}
</script>